<?php

namespace App\Http\Requests;

use App\RBAC\Roles\UserRoles;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            "name" => ['required', 'string', 'max:255'],
            "email" => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($this->user)],
            "password" => ["required_with:password_confirmation"],
            "password_confirmation" => ["required_with:password", 'same:password'],
            "role" => ["required", "string", Rule::in([UserRoles::EMPLOYEE->value, UserRoles::ADMIN->value])],
        ];
    }
}
