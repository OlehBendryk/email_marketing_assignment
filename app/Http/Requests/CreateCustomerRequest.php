<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCustomerRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'min:3', 'max:36'],
            'last_name' => ['required', 'string', 'min:3', 'max:36'],
            'email' => ['required', 'email', 'min:3', 'max:64'],
            'sex' => ['required', 'string'],
            'birth_date' => ['required', 'date'],
        ];
    }
}
