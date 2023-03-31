<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreUserRequest;
use App\services\Auth\LoginService;
use App\services\Auth\LogoutService;
use App\services\Auth\SignUpService;
use Exception;
use Illuminate\Foundation\Http\FormRequest;

class AuthenticateController extends Controller
{

    public function signup(FormRequest $request, SignUpService $signupService)
    {
        $data = $signupService->create($request);
        return response([
            'status' => 'success',
            'user_id' => $data['user_id'],
            'token' => $data['token'],
        ]);
    }

    public function login(LoginRequest $request, LoginService $loginService)
    {
        try
        {
            $data = $loginService->login($request);

            return response([
                'status' => 'success',
                'data' => $data
            ]);
        }
        catch(Exception $e)
        {
            return response([
                'status' => $e->getMessage()
            ]);
        }

    }

    public function logout(LogoutService $logoutService)
    {
        $logoutService->logout();
        return response(['status'=>'success']);
    }
}
