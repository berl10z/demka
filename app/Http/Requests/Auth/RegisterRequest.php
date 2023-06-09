<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required','string', 'max:255'],
            'surname' => ['required','string', 'max:255'],
            'patronymic' => ['nullable','string','max:255'],
            'login' => ['required','string','max:255', 'unique:users'],
            'email' => [ 'required','email', 'max:255','string'],
            'password' => ['required','string','min:6','confirmed'],
            'rules' => ['accepted']
        ];
    }
}
