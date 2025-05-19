<?php

namespace App\Http\Requests\Front\Contact;

use App\Helpers\Response\ResponseHelper;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ContactStoreRequest extends FormRequest
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
            "name" => "required|string|max:255",
            "email" => "required|email|max:255",
            "content" => "required|string|max:1000",
            "phone" => "nullable|string|max:20",
        ];
    }

    public function attributes(): array
    {
        return [
            "name" => "Ad Soyad",
            "email" => "E-mail",
            "content" => "Mesaj",
            "phone" => "Telefon",
        ];
    }
}
