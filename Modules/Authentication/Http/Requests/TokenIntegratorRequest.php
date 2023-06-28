<?php

namespace Modules\Authentication\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TokenIntegratorRequest extends FormRequest
{
    /** @return array */
    public function rules()
    {
        return [
            'name' => 'required'
        ];
    }

    /** @return array */
    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'name.max' => 'O campo nome aceita no máximo 50 caracteres.',
            'name.min' => 'O campo nome aceita no minimo 2 caractere.s',
        ];
    }
}
