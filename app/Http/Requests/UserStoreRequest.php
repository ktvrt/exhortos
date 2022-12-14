<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Validador del formulario de usuario
 */
class UserStoreRequest extends FormRequest
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
     * Get reglas de validacion that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'min:3', 'max:255'],
            'username' => ['required','min:5','max:255','unique:users,username'],
            'email' => ['required','email','unique:users,email'],
            'password' => ['required','min:6','max:255'],
            'roles' => ['array','size:1']   //debe seleccionar solo una opcion
        ];
    }

    /**
     * Get Mensajes de validacion Personalizados that apply to the request.
     *
     * @return array
     */
    /*
    public function messages()
    {
        return [
            'name.required' => 'El campo name es obligatorio',
            'email.required' => 'El campo email es obligatorio',
            'email.email' => 'El campo email no tiene formato valido',
            'email.unique' => 'El email ya se encuentra registrado',
            'password.required' => 'El campo password es obligatorio dasdasd',
            'password.min' => 'El campo :attribute minmo debe tener :min caracteres',
            'username.required' => 'El campo username es obligatorio',
            'username.unique' => 'El username ya se encuentra en uso por otro usuario',
            'roles.size' => 'nomas un rol'
        ];
    }
    */
}
