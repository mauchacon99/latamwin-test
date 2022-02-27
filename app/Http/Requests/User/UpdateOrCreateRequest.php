<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UpdateOrCreateRequest extends FormRequest
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

        return [
            'name'     => ['present', 'required', 'string'],
            'password' => ['present', 'required', 'string'],
            'role'     => ['present', 'required', 'string'],
            'email'    => [
                'present',
                'required',
                'string',
                'email',
                $this->user ?  Rule::unique('users')->ignore($this->user) : Rule::unique('users')
            ],
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function prepareInputs()
    {
        return [
            'name'     => $this->name,
            'email'    => $this->email,
            'password' => Hash::make($this->password),
        ];
    }
}
