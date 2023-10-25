<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ToursListRequest extends FormRequest
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
            'priceFrom' => 'numeric',
            'priceTo' => 'numeric',
            'dateFrom' => 'date',
            'dateTo' => 'date',
            'sortBy' => Rule::in(['price']),
            'sortOrder' => Rule::in(['asc', 'desc']),
        ];
    }

    public function messages(): array
    {
        return [
            'priceFrom.numeric' => 'The price from must be a number',
            'priceTo.numeric' => 'The price to must be a number',
            'dateFrom.date' => 'The date from must be a date',
            'dateTo.date' => 'The date to must be a date',
            'sortBy' => 'The sortBy must be one of the following: price',
            'sortOrder' => 'The sortOrder must be one of the following: asc, desc',
        ];
    }
}
