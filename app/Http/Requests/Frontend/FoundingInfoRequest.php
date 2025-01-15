<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class FoundingInfoRequest extends FormRequest
{
    // /**
    //  * Determine if the user is authorized to make this request.
    //  */
    // public function authorize(): bool
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'industry_type_id' => ['required', 'integer'],
            'organization_type_id' => ['required', 'integer'],
            'team_size_id' => ['required', 'integer'],
            'email' => ['required', 'email'],
            'phone' => ['required'],
            'establishment_date' => ['required', 'date'],
            'website' => ['nullable', 'active_url'],
            'country' => ['required', 'integer'],
            'state' => ['nullable', 'integer'],
            'city' => ['nullable', 'integer'],
            'address' => ['string', 'max:255'],
            'map_link' => ['nullable'],
        ];
    }
}
