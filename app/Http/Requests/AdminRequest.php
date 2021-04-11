<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
        if ($this->method() == 'PATCH') {
            return [
                'username' => 'required|max:191',
                'email' => 'required|email|max:191|unique:users,email,'. $this->admin->id,
                'phone' => 'max:191|unique:users,phone,'. $this->admin->id,
                'password_confirm' => 'same:password',
            ];
        }

        return [
            'country_id' => 'exists:countries,id',
            'city_id' => 'exists:cities,id',
            'username' => 'required|max:191',
            'email'  => 'required|email|max:191|unique:users',
            'phone' => 'required|max:191',
            'password' => 'required|min:6|max:255',
            'password_confirm' => 'same:password',
        ];
    }
}
