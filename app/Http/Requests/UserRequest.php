<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Actions\Fortify\PasswordValidationRules;

class UserRequest extends FormRequest
{
    use PasswordValidationRules;
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
        if ($this->request->get('_method') !== 'PUT') {
            return [
                'name'          => ['required', 'string', 'max:255'],
                'email'         => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
                'password'      => $this->passwordRules(),
                'address'       => ['required', 'string'],
                'roles'         => ['required', 'max:255', 'string', 'in:USER,ADMIN'],
                'houseNumber'   => ['required', 'string', 'max:255'],
                'phoneNumber'   => ['required', 'string', 'max:255'],
                'city'          => ['required', 'string', 'max:255'],
            ];
        } else {
            return [
                'name'          => ['required', 'string', 'max:255'],
                'email'         => ['required', 'string', 'email', 'max:255'],
                'address'       => ['required', 'string'],
                'roles'         => ['required', 'max:255', 'string', 'in:USER,ADMIN'],
                'houseNumber'   => ['required', 'string', 'max:255'],
                'phoneNumber'   => ['required', 'string', 'max:255'],
                'city'          => ['required', 'string', 'max:255'],
            ];
        }
    }
}
