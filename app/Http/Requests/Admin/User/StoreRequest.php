<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=> 'required|string',
            'email'=> 'required|string|email|unique:users',

            'role' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Это поле необходимо для заполнения',
            'name.string' => 'Имя дложно быть строкой',
            'email.required' => 'Это поле необходимо для заполнения',
            'email.string' => 'Имя дложно быть строкой',
            'email.email' => 'Почта дложна быть формата mail@mail.com',
            'email.unique' => 'Пользоватеь с таким email уже зарегистрирован',

        ];
    }
}
