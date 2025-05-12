<?php

namespace App\Http\Requests\Admin\Service;

use App\Helpers\Response\ResponseHelper;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Validator;

class ServiceStoreRequest extends FormRequest
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
            "service_name" => "required|string|max:255",
            "content" => "required|string",
            "service_status" => "required|exists:service_statuses,code",
            "file_one" => "nullable|file",
            "file_two" => "nullable|file",
            "image" => "required|image|mimetypes:image/jpeg,image/png,image/jpg,image/gif,image/svg+xml"
        ];
    }

    public function attributes()
    {
        return [
            "service_name" => "Hizmet Adı",
            "content" => "İçerik",
            "service_status" => "Hizmet Durumu",
            "file_one" => "Dosya 1",
            "file_two" => "Dosya 2",
            "image" => "Görsel",
        ];
    }
}
