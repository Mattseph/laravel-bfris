<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreResidentRequest extends FormRequest
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
            'lastname' => ['required', 'string', 'max:255'],
            'firstname' => ['required', 'string', 'max:255'],
            'midname' => ['nullable', 'string', 'max:255'],
            'suffix' => ['nullable', 'string', 'max:255'],
            'sex' => ['required', 'string', 'max:50'],
            'date_of_birth' => ['required', 'date', 'before_or_equal:today'],
            'place_of_birth' => ['required', 'string', 'max:255'],
            'civil_status' => ['required', 'string', 'max:100'],
            'nationality' => ['required', 'string', 'max:100'],
            'occupation' => ['required', 'string', 'max:255'],
            'religion' => ['required', 'string', 'max:100'],
            'blood_type' => ['required', 'string', 'max:100'],
            'educational_attainment' => ['required', 'string', 'max:100'],
            'phone_number' => ['required', 'string', 'max:13', 'unique:residents'],
            'tel_number' => ['nullable', 'string', 'max:100'],
            'email' => ['required', 'email', 'unique:residents'],
            'purok' => ['required', 'string', 'max:100'],
            'barangay' => ['required', 'string', 'max:100'],
            'city' => ['required', 'string', 'max:100'],
            'province' => ['required', 'string', 'max:100'],
            'is_fourps' => ['required', 'boolean', 'max:100'],
            'image' => ['nullable', 'image', 'max:2048', 'extensions:jpg,png,jpeg'],
            'is_disabled' => ['required', 'boolean', 'max:100'],
            'disability_type' => ['nullable', 'string', 'max:255'],
            'is_voter' => ['required', 'boolean', 'max:100'],
            'voter_number' => ['nullable', 'string', 'max:50'],
            'precinct' => ['nullable', 'string', 'max:50'],
            'is_vaccinated' => ['required', 'boolean', 'max:100'],
            'vaccine_1' => ['nullable', 'string', 'max:100'],
            'vaccine_1_date' => ['nullable', 'date', 'before_or_after:today'],
            'vaccine_2' => ['nullable', 'string', 'max:100'],
            'vaccine_2_date' => ['nullable', 'date', 'before_or_after:today'],
            'is_boostered' => ['nullable', 'boolean', 'max:100'],
            'booster_1' => ['nullable', 'string', 'max:100'],
            'booster_1_date' => ['nullable', 'date', 'before_or_after:today'],
            'booster_2' => ['nullable', 'string', 'max:100'],
            'booster_2_date' => ['nullable', 'date', 'before_or_after:today'],
            'name' => ['required', 'string', 'max:255', 'unique:emergency_contacts'],
            'relationship' => ['required', 'string', 'max:100'],
            'address' => ['required', 'string', 'max:255'],
            'contact' => ['required', 'string', 'max:13'],
        ];
    }
}
