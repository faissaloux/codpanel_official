<?php

namespace App\Http\Controllers\YoussefController;

use App\ClientOrder;
use App\DomainName;
use App\Http\Controllers\Controller;
use App\Staff;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Mockery\Exception;
use Stripe\Exception\ApiErrorException;
use Stripe\StripeClient;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('IsClient')->except('logout');
    }

    /**
     * @return Application|Factory|View
     */
    public function panels()
    {
        $client_orders = ClientOrder::where(['client_id' => Auth::guard('clients')->user()->id])->get();
        return view('client.panels', [
            'client_orders' => $client_orders
        ]);
    }

    public function orders()
    {
        $orders = ClientOrder::where(['client_id' => Auth::guard('clients')->user()->id])->get();
        return view('client.orders', [
            'orders' => $orders
        ]);
    }

    public function orderDetail(int $id)
    {
        $order = ClientOrder::where(['client_id' => Auth::guard('clients')->user()->id])->first();
        if ( !$order ) return back();

        return view('client.orderPaid', [
            'order' => $order
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function orderNow()
    {
        return view('client.ordernow');
    }

    /**
     * GET ALL THE STAFF USING THE DOMAIN NAME ID
     * @param int $id
     * @return Application|Factory|RedirectResponse|View
     */
    public function staff(int $id)
    {
        $order = ClientOrder::where([
            'domain_name_id' => $id,
            'client_id' => Auth::guard('clients')->user()->id,
            'paid' => true,
        ])->first();

        if ( !$order ) return back();

        $domain_name = $order->domain_name()->first();
        return view('client.staff', [
            'domain_name' => $domain_name
        ]);
    }

    public function storeNewOrderPanel(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required | string | max:255 | email | unique:staffs',
            'username' => 'required | string | max:255 | unique:staffs',
            'password' => 'required | string | max:255 | confirmed',
        ]);

        $client_order = new ClientOrder();
        $clientOrders = ClientOrder::all();
        $client_order_ids = [];
        foreach ($clientOrders as $clientOrder) {
            $client_order_ids[] = $clientOrder->domain_name()->first()->id;
        }

        $domain_names = DomainName::all()->toArray();
        $exists = true;

        while ($exists) {
            foreach ($domain_names as $domain_name) {
                if (!in_array($domain_name['id'], $client_order_ids)) {
                    $client_order->domain_name_id = $domain_name['id'];
                    $exists = false;
                    break;
                }
            }
        }

        $newStaff = new Staff();
        $newStaff->domain_name_id = $client_order->domain_name_id;
        $newStaff->client_id = Auth::guard('clients')->user()->id;
        $newStaff->email = $request['email'];
        $newStaff->username = $request['username'];
        $newStaff->password = Hash::make($request['password']);
        $newStaff->status = false;
        $newStaff->save();

        $client_order->client_id = Auth::guard('clients')->user()->id;
        $client_order->staff_id = $newStaff->id;
        $client_order->paid = false;
        $client_order->save();

        return redirect()->route('client.orderUnpaid', $client_order->id);
    }

    public function orderUnpaid(int $id)
    {
        $order = $this->getClientOrder($id)->first();
        return view('client.orderUnpaid', [
            'order' => $order
        ]);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return RedirectResponse`
     */
    public function checkout(Request $request, int $id): RedirectResponse
    {
        $request->validate([
            'payment_method' => 'required | string | max:255',
        ]);
        $request['payment_method'] = strtolower($request['payment_method']);
        if (!in_array($request['payment_method'], ['paypal', 'stripe'])) {
            return back()->with('error', 'Invalid payment choice !');
        }

        $order = $this->getClientOrder($id)->first();
        if (!$order) {
            return redirect()->route('client.panels');
        }

        switch ($request['payment_method']) {
            case 'stripe':
                return redirect()->route('client.payOrder', [
                    'id' => $id
                ]);
        }

        return redirect();
    }

    public function stripePayment(int $id)
    {
        $order = $this->getClientOrder($id)->first();
        if (!$order) return redirect()->route('client.panels');

        return view('client.payment.stripe', [
            'order' => $order
        ]);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     * @throws ApiErrorException
     */
    public function payOrder(Request $request, int $id): RedirectResponse
    {
        $order = $this->getClientOrder($id)->first();
        if ( !$order ) return redirect()->route('client.panels');

        try {
            $stripe = new StripeClient("sk_test_51HphgbCj5pOTCtg1LWwb5Bwujkq2Xa0KEUrJ8LoWCGUV21fqHiQHTESAU4ZKYvx7FLhX8sHEcmdV3Y5qiC5Em3UT00GfhA71Hp");
            $charge = $stripe->charges->create([
                'amount' => 2000,
                'currency' => 'usd',
                'source' => $request['stripeToken'], // obtained with Stripe.js
                'description' => 'My First Test Charge (created for API docs)'
            ]);
        }
        catch (Exception $exception) {
            return back()->with('errors', $exception->getMessage());
        }

        $order->paid = true;
        $staff = $order->staff()->first();
        $staff->status = 1;
        $staff->save();
        $order->save();

        return redirect()->route('client.panels');
    }

    /**
     * @param int $id
     * @return mixed
     */
    private function getClientOrder(int $id)
    {
        return ClientOrder::where(['client_id' => Auth::guard('clients')->user()->id, 'id' => $id, 'paid' => false]);
    }
}
