<?php

namespace App\Http\Controllers;

use App\Lists;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
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

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return new JsonResponse(['success' => 'logout']);
    }

    public function index(Request $request) {
        return new JsonResponse(['user' => Auth::user()]);
    }

    public function listing(Request $request ){
        $list = Lists::where('statue' , $request->type)->where('handler' , $request->handler)->get();
        return new JsonResponse(['list' => $list ]);
    }
}
