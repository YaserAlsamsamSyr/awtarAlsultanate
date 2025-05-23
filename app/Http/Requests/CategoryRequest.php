<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'enName'=>['required', 'string','regex:/^([a-zA-Z])+$/','max:255'],
            'category'=>['required', 'string','regex:/^([a-zA-Z]|\s|ذ|ض|ص|ث|ق|ف|لإ|إ|ع|ه|خ|ح|ج|د|ش|س|ي|ب|ل|ا|ت|ن|م|ك|ط|ظ|ز|و|ة|ى|لا|ر|ؤ|ء|ئ|إ|أ)+$/', 'max:255'],
            'img'=>['required','image','mimes:jpeg,jpg,png,gif']
        ];
    }
}
