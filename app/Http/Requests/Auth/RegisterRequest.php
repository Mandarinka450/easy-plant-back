<?php


namespace App\Http\Requests\Auth;


use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|unique:users|max:255|string',
            'password' => 'required|confirmed|min:8',
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'image' => 'nullable',
            'description' => 'string|max:255'
        ];
    }
}