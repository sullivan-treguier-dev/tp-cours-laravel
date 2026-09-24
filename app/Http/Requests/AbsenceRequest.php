<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AbsenceRequest extends FormRequest
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
     * @return array<string, /Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'date_debut' => 'required|date_format:d/m/Y H\hi',
            'date_fin' => 'required|date_format:d/m/Y H\hi|after_or_equal:date_debut',
            'motif' => 'required|string',
            'salarie_id' => 'required|exists:users,id'
        ];
    }
}
