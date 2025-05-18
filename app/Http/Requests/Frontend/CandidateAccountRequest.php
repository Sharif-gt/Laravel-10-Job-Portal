<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class CandidateAccountRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'country' => ['required', 'integer'],
            'state' => ['nullable', 'integer'],
            'city' => ['nullable', 'integer'],
            'address' => ['nullable', 'max:255'],
            'phone_number' => ['required'],
            'secondary_phone' => ['nullable'],
        ];
    }
}
