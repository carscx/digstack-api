<?php

namespace App\Http\Requests\Posts;

use App\Http\Requests\CustomRequest;

class StoreRequest extends CustomRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user  = request()->user('sanctum');
        $check = $user->tokenCan('post-store') || $user->tokenCan('post-*') || $user->tokenCan('*');
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
            'title'         => 'required|max:50|unique:posts,title',
            'description'   => 'required',
        ];
    }
}
