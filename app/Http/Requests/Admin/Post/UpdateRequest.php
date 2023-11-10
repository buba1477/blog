<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title'=> 'required|string',
            'content' => 'required|string',
            'preview_img' => 'nullable|file',
            'main_img' => 'nullable|file',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id',

        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле необходимо для заполнения',
            'title.string' => 'Данные должны быть строкой',
            'content.required' => 'Это поле необходимо для заполнения',
            'content.string' => 'Данные должны быть строкой',
            'preview_img.required' => 'Это поле необходимо для заполнения',
            'preview_img.file' => 'Необходимо выбрать файл',
            'main_img.required' => 'Это поле необходимо для заполнения',
            'main_img.file' => 'Необходимо выбрать файл',
            'category_id.required' => 'Это поле необходимо для заполнения',
            'category_id.integer' => 'ID категории должен быть числом',
            'category_id.exists' => 'ID категории должен быть в базе',
            'tag_ids.array' => 'Необходимо отправить массив данных',

        ];
    }
}
