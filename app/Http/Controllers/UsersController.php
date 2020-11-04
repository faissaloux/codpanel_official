<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderby('id','desc')->paginate(10);
        return view('admin.users.index',compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
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
  
          $user           = new User();
          $user->name     = $request->name;
          $user->email    = $request->email;
          $user->phone    = $request->phone;
          $user->role    = $request->role;
          $user->password = Hash::make($request->password);          
          $user->save();
          return redirect()->route('admin.users.home')->with('success', trans('user.created'));
    }

    public function edit($id)
    {
        $content = User::find($id);
        return view ('admin.users.edit',compact('content'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->phone    = $request->phone;
        $user->role     = $request->role;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('admin.users.home')->with('success',trans('user.updated'));
    }

    public function delete($id)
    {
        $content= User::find($id);
        $content->delete();
        return redirect()->route('admin.users.home')->with('success',trans('user.deleted'));
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
