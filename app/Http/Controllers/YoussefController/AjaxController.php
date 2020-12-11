<?php

namespace App\Http\Controllers\YoussefController;

use App\Http\Controllers\Controller;
use App\Staff;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mockery\Exception;

class AjaxController extends Controller
{
    public function addUserStaff(Request $request, int $id): JsonResponse
    {
        try {
            $request->validate([
                'email' => 'required | string | max:255 | unique:staffs',
                'username' => 'required | string | max:255 | unique:staffs',
                'password' => 'required | string | max:255',
                'status' => 'required | string | max:255',
                'access' => 'required',
            ]);

            if (!in_array($request['status'], ['active', 'suspended'])) {
                return new JsonResponse([
                    'error' => 'The status is not valid !',
                ]);
            }

            foreach ($request['access'] as $access) {
                if ( !in_array($access, Staff::ACCESS_RIGHTS)) {
                    return new JsonResponse([
                        'error' => "Unknown $access access right !",
                    ]);
                }
            }

            $staff = new Staff();
            $staff->email = $request['email'];
            $staff->client_id = Auth::guard('clients')->user()->id;
            $staff->domain_name_id = $id;
            $staff->username = $request['username'];
            $staff->password = Hash::make($request['username']);
            $staff->access = json_encode($request['access']);
            if ( $request['status'] === 'active' ) {
                $staff->status = 1;
            }
            else {
                $staff->status = 0;
            }
        } catch (Exception $exception) {
            return new JsonResponse(['error' => $exception->getMessage()]);
        }
        if ( !$staff->save() ) {
            return new JsonResponse(['message' => 'error', 'content' => 'An error was occurred !']);
        }
        else {
            return new JsonResponse(['message' => 'success', 'content' => 'The user was created with success !']);
        }
    }

    /**
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function editStaff(Request $request, int $id): JsonResponse
    {
        $staff = Staff::where(['client_id' => Auth::guard('clients')->user()->id, 'id' => $id])->first();
        if ( !$staff ) return new JsonResponse([
            'error' => 'Staff not found !',
        ]);

        foreach ($request['access'] as $access) {
            if ( !in_array($access, Staff::ACCESS_RIGHTS)) {
                return new JsonResponse([
                    'error' => "Unknown $access access right !",
                ]);
            }
        }

        try {
            if ( strtolower(trim($staff->username)) !== strtolower(trim($request['username'])) ) {
                $request->validate([
                    'username' => 'required | string | max:255 | unique:staffs',
                    'status' => 'required | string | max:255'
                ]);
            }
            else {
                $request->validate([
                    'username' => 'required | string | max:255 ',
                    'status' => 'required | string | max:255'
                ]);
            }

            if ( $request['status'] !== 'active' AND $request['status'] !== 'suspended') {
                return new JsonResponse([
                    'error' => 'The status is not valid !',
                ]);
            }

            $staff->username = $request['username'];
            if ( $request['status'] === 'active' ) {
                $staff->status = 1;
            }
            else {
                $staff->status = 0;
            }
            $staff->access = json_encode($request['access']);
            $staff->save();
        }
        catch ( Exception $exception ) {
            return new JsonResponse([
                'error' => $exception->getMessage()
            ]);
        }
        return new JsonResponse(['message' => 'The account was updated !']);
    }
}
