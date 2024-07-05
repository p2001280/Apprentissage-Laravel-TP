<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PropertyFormRequest extends FormRequest
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
            'title' => ['required', 'min:8'],
            'description' => ['required', 'min:8'],
            'surface' => ['required'],
            'rooms' => ['required', 'min:0'],
            'bedrooms' => ['required', 'integer', 'min:0'],
            'floor' => ['required', 'integer', 'min:0'],
            'price' => ['required', 'integer', 'min:0'],
            'city' => ['required'],
            'address' => ['required', 'min:8'],
            'postal_code' => ['required', 'max:5'],
            'sold' => ['required', 'boolean'],
        ];
    }
}
