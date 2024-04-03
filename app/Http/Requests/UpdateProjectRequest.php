<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            'title' => [
                'required',
                Rule::unique('projects')->ignore($this->project), 'max:150'
            ],
            'description' => ['nullable'],
            'img' => ['nullable', 'image'],
            'software' => ['required', 'string', 'max:255'],
            'type_id' => ['nullable', 'exists:types,id']
        ];
    }
}
