<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return !auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'regex:/^[А-Яа-яёЁ\s-]+$/iu'],
            'surname' => ['required', 'regex:/^[А-Яа-яёЁ\s-]+$/iu'],
            'login' => ['required', 'unique:users,login', 'regex:/^[A-Za-z]+$/u'],
            'email' => ['required', 'unique:users,email', 'email'],
            'password' => ['required', 'min:6'],
            'repeat_password' => ['required', 'same:password'],
        ];
    }
}
