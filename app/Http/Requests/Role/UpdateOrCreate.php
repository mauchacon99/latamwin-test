<?php

namespace App\Http\Requests\Role;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;

class UpdateOrCreate extends FormRequest
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
            'name' => [
                'required', 
                'string',   
                $this->role ?  Rule::unique('roles')->ignore($this->role) : Rule::unique('roles')
            ],
            'permissions' => [Rule::in(Permission::all()->pluck("id"))],

        ];
    }

    /**
     * Prepare the data for insertion into the model.
     *
     * @return array
     */

    public function prepareInputs()
    {
        return [
            'guard_name' => 'web',
            'name' => $this->name,
        ];
    }
}
