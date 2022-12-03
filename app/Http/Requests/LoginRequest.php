<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => ['required', 'string', 'email', 'max:300'],
            'password' => [
                'required', 
                'string', 
                'max:600', 
                Password::min(8)
                    ->mixedCase(),
            ],
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Correo electronico requerido.',
            'email.string' => 'El formato del correo no es válido.',
            'email.email' => 'El formato del correo no es válido.',
            'email.max' => 'El nombre no debe tener más de 300 caracteres.',

            'password.required' => 'Contraseña requerida.',
            'password.min' => 'la contraseña no debe tener menos de 8 caracteres.',
            'password.max' => 'la contraseña no debe tener más de 600 caracteres.',
        ];
    }
}
