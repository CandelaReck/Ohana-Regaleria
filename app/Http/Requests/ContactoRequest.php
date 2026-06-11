<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
        'nombre'   => 'required|string|max:255',
        'email'    => 'required|email',
        'telefono' => 'nullable|string|max:30',
        'mensaje'  => 'required|string|min:10',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'email.required'  => 'El email es obligatorio.',
            'email.email'     => 'Formato de email inválido.',
            'mensaje.min'    => 'La consulta debe tener al menos 10 caracteres.',
            'mensaje.required' => 'La consulta es obligatoria.',
            'mensaje.string'   => 'La consulta debe ser texto.',
        ];
    }
}