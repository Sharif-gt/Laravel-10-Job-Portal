<?php

namespace App\Http\Requests;

use App\Models\Companie;
use Illuminate\Foundation\Http\FormRequest;

class CompanyInfoUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    /**public function authorize(): bool
    {
        return false;
    }
     **/

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rulse = [
            'logo' => ['image', 'max:1500'],
            'banner' => ['image', 'max:1500'],
            'username' => ['required', 'string', 'max:50'],
            'name' => ['required', 'string', 'max:150'],
            'bio' => ['required'],
            'vision' => ['required'],
        ];

        $company = Companie::where('user_id', auth()->user()->id)->first();

        if (empty($company) || !$company?->logo) {
            $rulse['logo'][] = 'required';
        }

        if (empty($company) ||  !$company?->banner) {
            $rulse['banner'][] = 'required';
        }

        return $rulse;
    }
}
