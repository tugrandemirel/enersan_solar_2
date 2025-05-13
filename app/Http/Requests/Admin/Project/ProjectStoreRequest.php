<?php

namespace App\Http\Requests\Admin\Project;

use App\Helpers\Response\ResponseHelper;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProjectStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new HttpResponseException(ResponseHelper::validationError($validator->errors()));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "project_name" => "required|string|max:255",
            "content" => "required|string",
            "project_status" => "required|exists:project_statuses,code",
            "file_one" => "nullable|file",
            "file_two" => "nullable|file",
            "image" => "required|image|mimetypes:image/jpeg,image/png,image/jpg,image/gif,image/svg+xml",
            "images" => "nullable|array",
            "images.*" => "image|mimetypes:image/jpeg,image/png,image/jpg,image/gif,image/svg+xml",
        ];
    }

    public function attributes()
    {
        return [
            "project_name" => "Proje Adı",
            "content" => "Proje İçeriği",
            "project_status" => "Proje Durumu",
            "file_one" => "Belge 1",
            "file_two" => "Belge 2",
            "image" => "Kapak Resmi",
            "images" => "Galeri Resimleri",
            "images.*" => "Galeri Resimleri",
        ];
    }
}
