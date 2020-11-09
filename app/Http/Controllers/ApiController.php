<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Lists;
=======
use App\Cities;
use App\Items;
use App\Lists;
use App\Products;
use App\User;
>>>>>>> bebbbe546aea145b02df618af698d7e0ea27e61e
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class ApiController extends Controller
{
    /**
     * LOGIN THE USER AND SEND THE ACCESS TOKEN
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request)
    {
        $rules = [
            'email'    => 'required|email',
            'password' => 'required',
        ];

        $messages = [
            'email.required'    => trans("email.required"),
            'email.email'       => trans("email.email"),
            'password.required' => trans("password.required")
        ];

        $login = $request->validate($rules, $messages);

        if ( !Auth::attempt( $login ) ) {
            return new JsonResponse(['error' => 'Invalid credentials']);
        }

        $accessToken = Auth::user()->createToken('auhtenticate')->accessToken;

        return new JsonResponse([
            'success' => 'logged in !',
            'accessToken' => $accessToken
        ]);
    }

    /**
     * LOGOUT THE USER
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return new JsonResponse(['success' => 'logout']);
    }

    /**
     * RETURN THE PROFILE OF THE CURRENT USER
     *
     * @return JsonResponse
     */
    public function profile()
    {
        return new JsonResponse(['profile' => Auth::user()]);
    }

    /**
     * RETURN THE ALL THE LISTS BY THE NEWEST
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $lists = Lists::orderby('id', 'desc')->get();
        return new JsonResponse(['lists' => $lists]);
    }

    /**
     * CHANGE LIST STATUE
     *
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function statue(Request $request, $id)
    {
        if( !Auth::user()->role === 'admin' ) {
            return new JsonResponse([
                'message' => 'unauthorized'
            ], 401);
        }

        try {
            $list = Lists::find($id);
            $list->statue = $request->statue;

            $list->save();
        }
        catch (\ErrorException $e) {
            return new JsonResponse([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }

        return new JsonResponse([
            'statue' => 'success',
            'message' => 'The statue was changes with success'
        ]);
    }

    /**
     * CREATE NEW LIST
     *
     * @return JsonResponse
     */
    public function create()
    {
        $cities = Cities::orderby('id','desc')->get();
        $users = User::where('role', 'provider')->orderby('id','desc')->get();
        $products = Products::orderby('id','desc')->get();

        return new JsonResponse([
            'cities' => $cities,
            'users' => $users,
            'products' => $products
        ]);
    }

    /**
     * STORE NEW LISTING
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $post = $request->all();
        $lists = new Lists();
        $list_id = $this->saveList($lists, $post);
        $this->saveMultiSale($list_id, $post);

        return new JsonResponse([
            'status' => 'success',
            'message' => 'The list was successfully stored !'
        ]);
    }

    /**
     * RETURN THE LIST BY ITS ID
     *
     * @param $id
     * @return JsonResponse
     */
    public function edit($id)
    {
        return new JsonResponse([
            'list' => Lists::find($id)
        ]);
    }

    /**
     * UPDATE LIST
     *
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        try {
            $post = $request->all();
            $lists = Lists::find($id);
            $list_id = $this->saveList($lists, $post);
            $this->saveMultiSale($list_id, $post, true);
        }
        catch (\Exception $e) {
            return new JsonResponse([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }

        return new JsonResponse([
            'status' => 'success',
            'message' => 'The list was updated with success !'
        ]);
    }

    /**
     * UPDATE THE INFO OF THE CURRENT USER
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function updateInfo(Request $request)
    {
        $user = Auth::user();
        if ( strtolower($user->email) === strtolower($request->email) ) {
            $rules = [
                'email' => 'required | email',
                'phone' => 'required | string',
                'name'  => 'required | string'
            ];
        }
        else {
            $rules = [
                'email' => 'required | email | unique:users',
                'phone' => 'required | string',
                'name'  => 'required | string'
            ];
        }

        $messages = [
            'email.email'       => trans("email.email"),
            'email.unique'      => trans("email.unique"),
            'name.required'     => trans("name.required"),
        ];

        $credentials = $request->validate($rules, $messages);
        $user->name     = $credentials['name'];
        $user->email    = $credentials['email'];
        $user->phone    = $credentials['phone'];
        $user->full_name = $user->name;

        $user->save();

        return new JsonResponse([
            'status'  => 'success',
            'message' => 'The infos was updated with successfully !',
        ]);
    }

    /**
     * UPDATE THE PASSWORD OF THE USER
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function updatePassword(Request $request)
    {
        $user = Auth::user();
        $rules = [
            'password' => 'required | string | min:3',
        ];

        $message = [
            'password.required' => trans('password.required'),
            'password.min'      => trans('password.min'),
        ];

        $credentials = $request->validate($rules, $message);

        $user->password = Hash::make($credentials['password']);
        $user->save();

        return new JsonResponse([
            'status'  => 'success',
            'message' => 'The password was updated with successfully !'
        ]);
    }

    /**
     * SEND THE LINK RESET PASSWORD
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function forgot(Request $request)
    {
        $rules = [
            'email' => 'required | email',
        ];

        $messages = [
            'email.required' => trans('email.required'),
            'email.email'    => trans('email.email')
        ];

        $credentials = $request->validate($rules, $messages);
        if ( NULL === User::where('email', $credentials['email']) ) {
            return new JsonResponse([
                'status' => 'error',
                'message' => 'The email doesn\'t exists !'
            ], 401);
        }

        Password::sendResetLink($credentials);

        return new JsonResponse([
            'code'    => 'success',
            'message' => 'The password link has been sent to your mail box'
        ]);
    }

    /**
     * SAVE THE LIST GIVEN WITH THE GIVEN DATA
     *
     * @param $model
     * @param $post
     * @return mixed
     */
    private function saveList($model, $post)
    {
        $model->name        = $post['name'];
        $model->adress      = $post['adress'];
        $model->tel         = $post['tel'];
        $model->city_id     = $post['cityID'];
        $model->provider_id = Cities::find($post['cityID'])->provider_id ?? NULL;
        $model->laivraison  = $post['prix_de_laivraison'] ;
        $model->employee_id = $post['employee'] ?? $model->employee_id;

        $model->save();
        return $model->id;
    }

    /**
     * SAVE MULTI SALE LIST
     *
     * @param $list_id
     * @param $post
     * @param false $update`
     */
    private function saveMultiSale($list_id, $post, $update = false)
    {
        if ( $update ) {
            Items::where('list_id', $list_id)->delete();
            $this->multiSaleProductsSave($list_id, $post);
            return;
        }
        $this->multiSaleProductsSave($list_id, $post);
    }

    /**
     * SAVE PRODUCT FOR SPECIFIC LIST
     *
     * @param $list_id
     * @param $post
     */
    private function multiSaleProductsSave($list_id, $post)
    {
        if ( is_array( $post['ProductID'] ) ) {
            for ( $x = 0; $x < count($post['ProductID']); $x++ ) {
                $pro = new Items();
                $pro->list_id    = $list_id;
                $pro->product_id = $post['ProductID'][$x];
                $pro->price      = $post['prix'][$x];
                $pro->quantity   = $post['quantity'][$x];

                $pro->save();
            }
            return ;
        }
        $pro = new Items();

        $pro->list_id    = $list_id;
        $pro->product_id = $post['ProductID'];
        $pro->price      = $post['prix'];
        $pro->quantity   = $post['quantity'];
        $pro->save();
    }

    public function listing(Request $request ){
        $list = Lists::where('statue' , $request->type)->where('handler' , $request->handler)->get();
        return new JsonResponse(['list' => $list ]);
    }
}
