<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'email' => ['required', 'string','email', 'max:255'],
            'firstName'=> ['required', 'string', 'max:255'],
            'lastName'=> ['required', 'string', 'max:255'],
            'phone'=>['required','regex:/^[0-9]{7,20}$/'],
            'address'=> ['required', 'string', 'max:500'],
            'city'=> ['required', 'string', 'max:255'],
            'notics'=> ['nullable', 'string', 'max:1000']
        ];
    }
}
