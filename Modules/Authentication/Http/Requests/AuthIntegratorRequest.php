<?php

namespace Modules\Authentication\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthIntegratorRequest extends FormRequest
{
    /**  @return array */
    public function rules(): array
    {
        return [
            'token' => 'required',
            'secret' => 'required',
        ];
    }

    /**  @return array */
    public function messages(): array
    {
        return [
            'required' => 'Todos os campos são obrigatório.',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
