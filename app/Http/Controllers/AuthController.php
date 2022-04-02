<?php

namespace App\Http\Controllers;

use App\Actions\Authentications\LoginAction;
use App\Actions\Authentications\LogoutAction;
use App\Actions\Authentications\RegisterAction;
use App\Http\Requests\Authentications\LoginRequest;
use App\Http\Requests\Authentications\RegisterRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Auth Login User.
     *
     * @param  \App\Http\Requests\Authentications\LoginRequest $request
     * @return \App\Actions\Authentications\LoginAction;
     */
    public function login(LoginRequest $request)
    {
        return LoginAction::execute($request);
    }

    /**
     * Auth Regiter User.
     *
     * @param  \App\Http\Requests\Authentications\RegisterRequest $request
     * @return \App\Actions\Authentications\RegisterAction;
     */
    public function register(RegisterRequest $request)
    {
        return RegisterAction::execute($request);
    }


    /**
     * Auth Logout User.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \App\Actions\Authentications\LogoutAction;
     */
    public function logout(Request $request)
    {
        return LogoutAction::execute($request);
    }
}
