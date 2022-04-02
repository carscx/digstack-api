<?php

namespace App\Http\Requests\Users;

use App\Http\Requests\CustomRequest;

class UpdateRequest extends CustomRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user  = request()->user('sanctum');
        $check = $user->tokenCan('user-update') || $user->tokenCan('user-*') || $user->tokenCan('*');
        return $user->status == 1 && $check;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        /**
         * request()->segment(index)
         * /api/users/{id}
         */
        return [
            'username'     => 'unique:users,username,' . request()->segment(3),
            'email'        => 'email|unique:users,email,' . request()->segment(3),
            'password'     => 'min:6'
        ];
    }
}
