<?php

namespace App\Http\Requests\Users;

use App\Http\Requests\CustomRequest;

class DestroyRequest extends CustomRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user  = request()->user('sanctum');
        $check = $user->tokenCan('user-destroy') ||  $user->tokenCan('user-*') || $user->tokenCan('*');
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
            //
        ];
    }
}
