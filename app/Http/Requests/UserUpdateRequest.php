<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
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
        //atraemos la variable del controlador
        $usuario = $this->route('usuario');
        return [
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')
                    ->ignore($usuario->id)
            ],
            'password' => 'sometimes',
            //'username' => 'required',
            'username' => [
                'required',
                'min:5',
                'max:255',
                Rule::unique('users', 'username')
                    ->ignore($usuario->id)
            ],
        ];
    }

    /**
     * Get Mensajes de validacion Personalizados that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'El campo name es obligatorio',
            'email.required' => 'El campo email es obligatorio',
            'email.email' => 'El campo email no tiene formato valido',
            'email.unique' => 'El email ya se encuentra registrado',
            'username.required' => 'El campo username es obligatorio',            
            'username.unique' => 'El username ya esta en uso por otro usuario',
        ];
    }
}
