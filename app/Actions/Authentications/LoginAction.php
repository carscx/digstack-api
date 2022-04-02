<?php

namespace App\Actions\Authentications;

use App\Actions\Handlers\HandlerResponse;
use App\Actions\Handlers\HandlerToken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginAction
{
    /**
     * Auth Login Action.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \App\Actions\Handlers\HandlerResponse;
     */
    public static function execute(Request $request)
    {
        try {
            $credential = [
                'email' => $request->email,
                'password' => $request->password,
            ];

            if (!Auth::attempt($credential))
                return HandlerResponse::responseJSON([
                    'message' => '¡El usuario o la contraseña son incorrectos!'
                ], 401);

            $user = User::where('email', $request['email'])->first();
            if ($user->status == 0)
                return HandlerResponse::responseJSON([
                    'message'  => 'Usuario ha sido desactivado.'
                ], 403);

            /** Update Actived_At */
            $user->last_actived_at = now();
            $user->save();

            return HandlerResponse::responseJSON([
                'message' => 'Login realizado.',
                'data'    => ['access_token' => HandlerToken::generate($user), 'user' => $user]
            ]);
        } catch (\Throwable $th) {
            // throw $th;

            return HandlerResponse::responseJSON([
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
