<?php

namespace App\Actions\Authentications;

use App\Actions\Handlers\HandlerResponse;
use App\Actions\Handlers\HandlerToken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterAction
{
    /**
     * Auth Register Action.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \App\Actions\Handlers\HandlerResponse;
     */
    public static function execute(Request $request)
    {
        try {
            $user = new User();
            $user->role_id  = $request['role_id'];
            $user->username = $request['username'];
            $user->first_name = $request['first_name'];
            $user->last_name = $request['last_name'];
            $user->email    = $request['email'];
            $user->password = Hash::make($request['password']);

            if ($file = $request->file('image')) {
                $destinationPath = "images/";
                $final_location = $destinationPath . "/";
                $name = $file->getClientOriginalName();
                $path = $file->move($final_location, $file.'.'.$file->getClientOriginalExtension());
                $user->image = $file;
                $user->image_name = $name;
                $user->image_path= $path;
            }

            $user->save();

            return HandlerResponse::responseJSON([
                'message' => 'Usuario registrado correctamente.',
                'data'    => ['token' => HandlerToken::generate($user), 'user' => $user]
            ], 201);
        } catch (\Throwable $th) {
            // throw $th;
            return HandlerResponse::responseJSON([
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
