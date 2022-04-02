<?php

namespace App\Actions\Users;

use App\Actions\Handlers\HandlerResponse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UpdateAction
{
    /**
     * Users Update Action.
     * 
     * @param  int  $id
     * @param  \Illuminate\Http\Request $request
     * @return \App\Actions\Handlers\HandlerResponse;
     */
    public static function execute($id, Request $request)
    {
        try {
            $user = User::find($id);
            if (!$user)
                return HandlerResponse::responseJSON([
                    'message' => 'User ID Not Found.'
                ], 404);

            if (!empty($request['password']))
                $request['password'] = Hash::make($request['password']);

            $user->username = $request['username'] ?? $user->username;
            $user->email    = $request['email']    ?? $user->email;
            $user->password = $request['password'] ?? $user->password;

            if ($request->user('sanctum')->tokenCan('*'))
                $user->role_id = $request['role_id'] ?? $user->role_id;

            $user->save();

            return HandlerResponse::responseJSON([
                'message' => 'User Updated.',
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return HandlerResponse::responseJSON([
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
