<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PriceRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'lable' => ['required', 'max:120'],
            'price' => ['required', 'integer'],
            'job_limit' => ['required', 'integer'],
            'feature_job_limit' => ['required', 'integer'],
            'highlight_job_limit' => ['required', 'integer'],
            'profile_verified' => ['required', 'boolean'],
            'recommended' => ['required', 'boolean'],
            'frontend_show' => ['required', 'boolean'],
            'home_show' => ['required', 'boolean'],
        ];
    }
}
