<?php

namespace App\Actions\Authentications;

use App\Actions\Handlers\HandlerResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutAction
{
    /**
     * Auth Logout Action.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \App\Actions\Handlers\HandlerResponse;
     */
    public static function execute(Request $request)
    {
        try {
            $user = $request->user('sanctum');;

            if (!$user)
                return HandlerResponse::responseJSON([
                    'message' => 'Logout Failed.'
                ], 400);

            /** Update Last_Actived_At */
            $user->last_actived_at = now();
            $user->save();

            $user->tokens()->delete();

            Auth::logout();

            return HandlerResponse::responseJSON([
                'message' => 'Logout Successfully.'
            ]);
        } catch (\Throwable $th) {
            // throw $th;
            return HandlerResponse::responseJSON([
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
