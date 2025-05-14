<?php

namespace App\Http\Requests\Admin\Slider;

use Illuminate\Foundation\Http\FormRequest;

class SliderStoreRequest extends FormRequest
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
            "sub_title" => "nullable|string|max:255",
            "main_title" => "nullable|string|max:255",
            "desc" => "nullable|string|max:255",
            "button_link_one" => "nullable|string|max:255",
            "button_one_text" => "nullable|string|max:255",
            "button_link_two" => "nullable|string|max:255",
            "button_two_text" => "nullable|string|max:255",
            "image" => "required|image|mimetypes:image/jpeg,image/png,image/jpg,image/gif,image/svg+xml",
        ];
    }


}
