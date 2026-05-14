<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistroRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre'            => 'required|string|max:50',
            'apellido'          => 'required|string|max:50',
            'email'             => 'required|email|max:100|unique:users,email',
            'password'          => 'required|string|min:8|confirmed',
            'password2'         => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required'               => 'El nombre es obligatorio.',
            'apellido.required'             => 'El apellido es obligatorio.',
            'email.required'                => 'El email es obligatorio.',
            'email.email'                   => 'Formato de email inválido.',
            'email.unique'                  => 'Este email ya está registrado.',
            'password.required'             => 'La contraseña es obligatoria.',
            'password.min'                  => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed'            => 'Las contraseñas no coinciden.',
            'password_confirmation.required'=> 'Repetí la contraseña.',
        ];
    }
}
