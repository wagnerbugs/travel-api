<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TravelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Alternatively use auth()->check() but my personal preference is to use middleware
        // return auth()->check();
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
            'is_public' => 'boolean',
            'name' => ['required', 'unique:travels'], // 'unique:travels' is a custom rule because we are using the sluggable trait
            'description' => ['required'],
            'number_of_days' => ['required', 'integer', 'min:1'],
        ];
    }
}
