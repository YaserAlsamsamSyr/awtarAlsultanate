<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
                'imgs'=>['required'],
                'imgs.*'=>['image','mimes:jpeg,jpg,png,gif'],
                'name'=>['required', 'string', 'max:255'],
                'desc'=>['required', 'string', 'max:500'],
                'newPrice'=>['nullable','numeric', 'max:200'],
                'oldPrice'=>['required', 'numeric', 'max:200'],
                'offerNotic'=>['nullable', 'string', 'max:500']
        ];
    }
}