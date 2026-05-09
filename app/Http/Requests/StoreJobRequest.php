<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'company' => 'required',
            'location' => 'required',
            'salary' => 'required|numeric|min:0',
            'employer_id' => 'exists:employers,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The job title is required.',
            'description.required' => 'The job description is required.',
            'company.required' => 'The company name is required.',
            'location.required' => 'The job location is required.',
            'salary.required' => 'The salary is required.',
            'salary.numeric' => 'The salary must be a number.',
            'salary.min' => 'The salary must be at least 0.',
            'employer_id.exists' => 'The selected employer does not exist.',
        ];
    }
}
