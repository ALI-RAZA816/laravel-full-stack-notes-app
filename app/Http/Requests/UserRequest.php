<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    protected $stopOnFirstFailure = true;
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
            'fullname'=>'bail|required|unique:users,email',
            'email'=>'bail|required|email|unique:users,email',
            'password'=>'required|confirmed',
            'profile'=>'bail|nullable|mimes:png,jpg|max:2048',
            'phone'=>'nullable'
        ];
    }
}
