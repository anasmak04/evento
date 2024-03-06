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
        return false;
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
            'description' => 'required|string',
            'date' => 'required|date|after:today',
            'lieu' => 'required|string',
            'category_id' => 'required|integer|exists:categories,id',
            'places_Disponible' => 'required|integer|min:1',
            'organizer_id' => 'required|integer|exists:users,id',
            'is_approved' => 'sometimes|boolean',
            'auto_accept' => 'sometimes|boolean',
        ];
    }
}
