<?php

namespace App\Http\Requests\Projects;

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
        $check = $user->tokenCan('project-update') || $user->tokenCan('project-*') || $user->tokenCan('*');
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
         * /api/projects/{id}
         */
        return [
            'user_id'       => 'numeric',
            'title'         => 'max:50|unique:projects,title,' . request()->segment(3),
            'image'         => 'image',
        ];
    }
}
