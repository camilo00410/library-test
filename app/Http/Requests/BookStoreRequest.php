<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookStoreRequest extends FormRequest
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
            'title' => ['required', 'max:500'], 
            'isbn' => ['required', 'numeric', 'min:13'], 
            'publication_year' => ['required', 'integer'], 
            'author' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Titulo requerido.',
            'title.max' => 'El titulo no debe tener más de 500 caracteres.',

            'isbn.required' => 'ISBN requerido.',
            'isbn.numeric' => 'ISBN debe de ser un numero.',
            'isbn.min' => 'ISBN no debe tener menos de 13 caracteres.',

            'publication_year.required' => 'Año de publicación requerido.',
            'publication_year.integer' => 'Año de publicación debe de ser de tipo entero.',
            'author.required' => 'Autor requerido.',
           
        ];
    }
}
