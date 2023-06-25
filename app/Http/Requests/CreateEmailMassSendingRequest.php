<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class CreateEmailMassSendingRequest extends FormRequest
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
            'email_template_id' => ['required', 'integer', 'exists:email_templates,id'],
            'group_id' => ['required', 'integer', 'exists:groups,id'],
            'sent_to' => ['datetime', 'nullable'],
        ];
    }
}
