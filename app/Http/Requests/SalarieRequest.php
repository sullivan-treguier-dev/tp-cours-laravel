<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class SalarieRequest extends FormRequest
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
        $rules = [
            'nom' => 'required|string|min:2',
            'prenom' => 'required|string|min:2',
            'email' => 'required|email',
        ];

        if ($this->routeIs('salarie.create')) {
            $rules['password'] = ['required', 'string', Password::min(8)];
        } else {
            $rules['password'] = ['nullable', 'string', Password::min(8)];
        }
        return $rules;
    }
}
