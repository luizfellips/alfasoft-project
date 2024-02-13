<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
        $contactId = $this->route('contact') ? $this->route('contact')->id : null;

        return [
            'contact.name' => 'required|string|max:255|min:4',
            'contact.email' => [
                'required',
                'email',
                Rule::unique('contacts', 'email')->ignore($contactId),
                'max:255',
            ],
            'contact.contact' => [
                'required',
                'string',
                'regex:/^[0-9]{1,9}$/',
                Rule::unique('contacts', 'contact')->ignore($contactId),
                'max:9',
            ],
        ];
    }


    public function messages(): array
    {
        return [
            'contact.name.required' => 'The name field is required.',
            'contact.name.string' => 'The name must be a string.',
            'contact.name.max' => 'The name must not exceed 255 characters.',
            'contact.name.min' => 'The name must be at least 5 characters long.',
            'contact.email.required' => 'The email field is required.',
            'contact.email.email' => 'Please enter a valid email address.',
            'contact.email.unique' => 'This email address is already taken.',
            'contact.email.max' => 'The email must not exceed 255 characters.',
            'contact.contact.required' => 'The contact number field is required.',
            'contact.contact.numeric' => 'The contact number must be a number.',
            'contact.contact.max' => 'The contact number must not exceed 9 characters.',
            'contact.contact.regex' => 'The contact number must only contain numbers.',
            'contact.contact.unique' => 'This contact number is already taken.',

        ];
    }
}
