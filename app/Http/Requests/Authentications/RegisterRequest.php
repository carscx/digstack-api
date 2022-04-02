<?php

namespace App\Http\Requests\Authentications;

use App\Http\Requests\CustomRequest;

class RegisterRequest extends CustomRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user  = request()->user('sanctum');
        $check = $user->tokenCan('auth-register') || $user->tokenCan('auth-*') || $user->tokenCan('*');
        return $user->status == 1 && $check;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'    => 'required|email|unique:users,email',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:6',
            'role_id'  => 'required'
        ];
    }
}
