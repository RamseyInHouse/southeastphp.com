<?php

namespace SoutheastPhp\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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

    public function getEmail()
    {
        return $this->get('user.email');
    }

    public function getPassword()
    {
        return $this->get('user.password');
    }

    public function getRememberMe()
    {
        return $this->get('user.rememberMe');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user.email' => 'required|email|unique:users',
            'user.password'=> 'required|string',
        ];
    }
}
