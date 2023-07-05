<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendMailPorfolioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /** @return array */
    public function rules(): array
    {
        return [
            'fullName' => 'required|min:3|max:100',
            'addressEmail' => 'required|email',
            'phoneContact' => 'required|min:11|max:11',
            'subjectEmail' => 'required|min:3|max:30',
            'message' => 'required|min:3|max:255',
        ];
    }

    /** @return array */
    public function messages(): array
    {
        return [
            'required' => "O campo é obrigatório.",
            'phoneContact.min' => "O 'Telefone de Contato' no minimo pode ter 11 caracteres.",
            'phoneContact' => "O campo 'Telefone de Contato' no máximo pode ter 11 caracteres.",
            'min' => "O minimo é somente 3 caracteres.",
            'fullName.max' => "O campo 'Nome Completo' aceita no máximo 100 caracteres.",
            'subjectEmail.max' => "O campo assunto pode ter no máximo 30 caracteres.",
            'message.max' => "O campo mensagem pode ter no máximo 255 caracteres.",
        ];
    }
}
