<?php

namespace App\Http\Requests\Posts;

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
        $check = $user->tokenCan('post-update') || $user->tokenCan('post-*') || $user->tokenCan('*');
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
         * /api/posts/{id}
         */
        return [
            'user_id'       => 'numeric',
            'title'         => 'max:50|unique:posts,title,' . request()->segment(3),
        ];
    }
}
