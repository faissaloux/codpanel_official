<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use App\User;
use App\Admin;
use App\Client;
use App\Employee;
use App\Provider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $admins = Admin::orderby('id','desc')->get();
        $providers = Provider::orderby('id','desc')->get();
        $employees = Employee::orderby('id','desc')->get();
        $clients = Client::orderby('id','desc')->get();
        $users = $admins->mergeRecursive($providers)->mergeRecursive($employees)->mergeRecursive($clients);
        $users->map(function($user){
            $user->role = substr($user->getTable(), 0, -1);
        });
        $users = \System::mergedPaginate($users,'/dashboard/users');
        if($request->ajax())
            return response()->view('dashboard.elements.users_table' , compact('users'))->setStatusCode(200);

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
            
            if(!in_array($request->role, \System::$roles)) abort(403);
            $user = \Role::new($request->role);
            
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

    public function edit($role, $id)
    {
        $content = \Role::find($id, $role);
        $content->role = substr($content->getTable(), 0, -1);

        return view('dashboard.users.edit',compact('content'));
    }

    public function update(Request $request, $role, $id)
    {
        if(!in_array($request->role, \System::$roles)) abort(403);
        $user = \Role::find($id, $role);

        if($request->role != $role){
            /**
             * Get user full_name and password to pass'em
             * to the new role table.
             */
            $password = $user->password;
            $full_name = $user->full_name;
            /**
             * if role changed delete from old role table,
             * and register it in new role table.
             */
            $user->delete();
            unset($user);
            $user = \Role::new($request->role);
            $user->password = $password;
            $user->full_name = $full_name;
        }

        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->phone    = $request->phone;

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

    public function delete($role, $id)
    {
        \Role::delete($id, $role);
        return redirect()->route('dashboard.users.index')->with('success',trans('user.deleted'));
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