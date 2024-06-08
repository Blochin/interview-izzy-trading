<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'registration_number' => 'required_if:is_registered,true|max:255',
            'is_registered' => 'boolean',
            'parts' => 'array',
            'parts.*.serial_number' => 'required|string|max:255',
            'parts.*.name'=> 'required|string|max:255',
        ];
    }
}
