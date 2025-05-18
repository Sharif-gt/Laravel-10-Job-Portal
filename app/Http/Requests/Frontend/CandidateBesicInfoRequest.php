<?php

namespace App\Http\Requests\Frontend;

use App\Models\Candidate;
use Illuminate\Foundation\Http\FormRequest;

use function PHPSTORM_META\type;

class CandidateBesicInfoRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rulse = [
            'image' => ['image', 'max:1500'],
            'cv' => ['nullable', 'mimes:pdf,csv,epub', 'max:20000'],
            'full_name' => ['required', 'string', 'max:250'],
            'title' => ['nullable', 'string'],
            'experience_level' => ['required', 'integer'],
            'website' => ['nullable', 'active_url'],
            'date_of_birth' => ['required', 'date'],
        ];

        $candidate = Candidate::where('user_id', auth()->user()->id)->first();

        if (empty($candidate) || !$candidate?->image) {
            $rulse['image'][] = 'required';
        }

        return $rulse;
    }
}
