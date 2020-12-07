<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Client;
use App\Employee;
use Auth;
use Hash;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Provider;

class UsersController extends Controller
{
    public function index()
    {
        //$users = User::orderby('id','desc')->get();
        
        $admins = Admin::orderby('id','desc')->get();
        $providers = Provider::orderby('id','desc')->get();
        $emlpoyees = Employee::orderby('id','desc')->get();
        $clients = Client::orderby('id','desc')->get();


        $users = $admins->mergeRecursive($providers)->mergeRecursive($emlpoyees)->mergeRecursive($clients);

        $users->all();


        return view('dashboard.users.index',compact('users'));
    }

    public function create()
    {
        return view('dashboard.users.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'email'    => 'required|email|unique:users', 
            'password' => 'required|min:3',
            'name'     => 'required|string|min:4',
            'phone'    => 'required',
          ];
  
          $messages = [
              'email.required'    => trans("email.required"),
              'email.email'       => trans("email.unique"),
              'email.unique'      => trans("name.required"),
              'password.required' => trans("password.required"),
              'password.min'      => trans("password.min"),
              'name.required'     => trans("name.required"),
              'phone.required'    => trans("phone.required"),
          ];
  
            $request->validate($rules,$messages);
    
            switch($request->role){
                case "admin"    :   $user = new Admin();
                                    break;
                case "employee" :   $user = new Employee();
                                    break;
                case "provider" :   $user = new Provider();
                                    break;
            };
            
            $user->name     = $request->name;
            $user->email    = $request->email;
            $user->phone    = $request->phone;
            
            $user->password = Hash::make($request->password);
          
            $user->image = '';

            if($request->hasFile('image'))
                $user->image = $request->image->store('users',['disk' => 'public']);
            

          $user->save();
          
          return redirect()->route('dashboard.users.index')->with('success', trans('user.created.'.$request->role));
    }

    public function edit($id)
    {
        $content = User::find($id);
        return view ('dashboard.users.edit',compact('content'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->phone    = $request->phone;
        if(!empty ( $request->role ))
            $user->role = $request->role;

        if(!empty ( $request->password ))
            $user->password = Hash::make($request->password);

        // delete the old image
        if($request->hasFile('image') and !empty($request->image) ){
            $file = public_path().'/uploads/'.$user->image;
            if(file_exists($file)) unlink($file);
        }
        
        $user->save();
        return redirect()->route('dashboard.users.index')->with('success',trans('user.updated'));
    }

    public function delete($id)
    {
        User::find($id)->delete();
        return redirect()->route('dashboard.users.index')->with('failed',trans('user.deleted'));
    }

    public function profile($id)
    {
        $content= User::find($id);
        return view('dashboard.users.profile' ,compact('content'));
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $message = trans('user.oldMessageWrong');
        $alert   = 'error';

        if (Hash::check($request->old_pass, $user->password)) {
                if($request->new_pass == $request->new_pass_re ){
                    $user->password = Hash::make($request->new_pass);
                    $user->save();
                }
                $message = trans('user.adminPwdUpdated');
                $alert   = 'success';
        }

        return redirect()->route('admin.account')->with($alert,$message); 
    }
}
