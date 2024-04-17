<?php

namespace App\Http\Requests\User;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileUserRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'avatar' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048', 'nullable'],
            'name' => ['string', 'nullable'],
            'email' => ['string', 'email', 'unique:users', 'nullable']
        ];
    }
}
