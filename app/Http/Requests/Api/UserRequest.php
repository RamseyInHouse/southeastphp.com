<?php

namespace SoutheastPhp\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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

    public function getFirstName()
    {
        return $this->get('firstName');
    }

    public function getLastName()
    {
        return $this->get('lastName');
    }

    public function getEmail()
    {
        return $this->get('email');
    }

    public function getPreferredName()
    {
        return $this->get('preferredName');
    }

    public function getCompanyName()
    {
        return $this->get('companyName');
    }

    public function getTwitter()
    {
        return $this->get('twitter');
    }

    public function getPassword()
    {
        return $this->get('password');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ];
    }
}
