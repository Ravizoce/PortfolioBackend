<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationRequest extends FormRequest
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
            "degree_name" => "required|string|max:50",
            "board" => "required|string|max:50",
            "college" => "required|string|max:200",
            "content" => "required|string",
            "description"=>"required|string"
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'content' => json_encode($this->input('content')),
        ]);
    }
}
