<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'titre' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'date' => 'required|date|after_or_equal:today',
            'lieu' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:categories,id',
            'places_Disponible' => 'required|integer|min:1',
            'event_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'auto_accept' => 'sometimes|boolean'
        ];
    }
}
