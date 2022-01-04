<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name'     => ['required', 'max:255', 'min:3'],
			'username' => ['required', 'max:255', 'min:3', Rule::unique('users', 'username')],
			'password' => ['required', 'max:255', 'min:3'],
			'email'    => ['required', 'email', 'max:255', 'min:5', Rule::unique('users', 'email')],
        ];

        return $rules;
    }
}
