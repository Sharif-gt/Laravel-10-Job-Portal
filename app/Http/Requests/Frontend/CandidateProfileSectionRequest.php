<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class CandidateProfileSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'gender' => ['required', 'in:male,female'],
            'marital_status' => ['nullable', 'in:single,married'],
            'profession' => ['required', 'integer'],
            'status' => ['nullable', 'in:available,not_available'],
            'skills' => ['required'],
            'languages' => ['required'],
            'bio' => ['nullable']
        ];
    }
}
