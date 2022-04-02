<?php

namespace App\Http\Requests;

use App\Actions\Handlers\HandlerResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use stdClass;

class CustomRequest extends FormRequest
{
    /**
     * Custom Message Failed Authorization
     *
     */
    protected function failedAuthorization()
    {
        throw new HttpResponseException(
            HandlerResponse::responseJSON([
                'message' => 'Esta acción no se puede realizar.'
            ], 403)
        );
    }

    /**
     * Custom Message Failed Validation
     *
     * @param \Illuminate\Contracts\Validation\Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        $errors = new stdClass;
        foreach ($this->validator->errors()->messages() as $key => $value) {
            $errors->$key = $value[0];
        }

        throw new HttpResponseException(
            HandlerResponse::responseJSON([
                'errors' => $errors
            ], 422)
        );
    }

    /**
     * Custom Message Failed Validation
     */
    public function messages()
    {
        return [
            'required'  => ':Attribute es obligatorio.',
            'unique'    => ':Attribute ya existe.',
            'email'     => ':Attribute debe ser una dirección válida.',
            'numeric'   => ':Attribute debe ser un número.',
            'min'       => ':Attribute debe contener al menos :min caracteres o más.',
            'max'       => ':Attribute no debe ser mayor a :max caracteres.',
            'array'     => ':Attribute debe ser un array.',
        ];
    }
}
