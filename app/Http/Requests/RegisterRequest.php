<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:250', 'regex:/^[\pL\s\-]+$/u'],
            'email' => ['required', 'string', 'email', 'max:300', 'unique:users'],
            'password' => [
                'required', 
                'string', 
                'max:600', 
                'confirmed', 
                Password::min(8)
                    ->mixedCase(),
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nombre requerido.',
            'name.string' => 'El formato del nombre no es válido.',
            'name.max' => 'El nombre no debe tener más de 250 caracteres.',
            'name.regex' => 'El formato del nombre no es válido.',

            'email.required' => 'Correo electronico requerido.',
            'email.string' => 'El formato del correo no es válido.',
            'email.email' => 'El formato del correo no es válido.',
            'email.max' => 'El nombre no debe tener más de 300 caracteres.',
            'email.unique' => 'El email ya ha sido registrado.',

            'password.required' => 'Contraseña requerida.',
            'password.min' => 'la contraseña no debe tener menos de 8 caracteres.',
            'password.max' => 'la contraseña no debe tener más de 600 caracteres.',
            'password.confirmed' => 'La confirmación de la contraseña no coincide.',
        ];
    }
}
