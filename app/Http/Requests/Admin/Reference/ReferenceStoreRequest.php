<?php

namespace App\Http\Requests\Admin\Reference;

use Illuminate\Foundation\Http\FormRequest;

class ReferenceStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required|string|max:255",
            "url" => "nullable|string|max:255",
            "desc" => "nullable|string|max:255",
            "image" => "required|image|mimetypes:image/jpeg,image/png,image/jpg,image/gif,image/svg+xml",
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            "name" => "Başlık",
            "url" => "URL",
            "desc" => "Açıklama",
            "image" => "Görsel",
        ];
    }
}
