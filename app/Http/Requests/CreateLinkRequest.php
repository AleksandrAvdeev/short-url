<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $url
 */
class CreateLinkRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'url' => 'required|url|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'url.required' => 'Url обязателен для заполнения',
            'url.url' => 'Url указан в неверном формате',
            'url.max' => 'Превышена максимальная длина URL',
        ];
    }
}
