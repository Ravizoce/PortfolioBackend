<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkillRequest extends FormRequest
{

    private $types = [1 => "pro_lan", 2 => "database", 3 => "cloude", 4 => "framework", 5 => "devops", 6 => "testing"],
    $groups = [1 => "frontend", 2 => "backend", 3 => "mobile"];

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    public function prepareForValidation()
    {

        if ($this->has('type')) {
            $this->merge([
                '_original_type' => $this->input('type'),
            ]);
            $this->merge([
                'type' => $this->types[$this->input('type')],
            ]);
        }
        if ($this->has('group')) {
            $this->merge([
                '_original_group' => $this->input('group'),
            ]);
            $this->merge([
                'group' => $this->groups[$this->input('group')],
            ]);
        }
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // dd($this);
        
        return [
            "name" => "required|string",
            "type" => "required|string|In:pro_lan,database,cloude,framework,devops,testing",
            "group" => "nullable|string|in:frontend,backend,mobile",
            "icon_tag" => "nullable|string|max:255||required_without:icon_svg",
            "icon_svg" => "nullable|string|required_without:icon_tag",
        ];
    }
    public function attributes()
    {
        return [
            "name" => "Icon Name",
        ];
    }
    public function passedValidation(){
        $this->merge([
            "slug"=>\Str::slug($this->name)
        ]);
    }
}
