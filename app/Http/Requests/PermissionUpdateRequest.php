<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Regalas de valiadacion para actualizar Permisos
 */
class PermissionUpdateRequest extends FormRequest
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
        $permission = $this->route('permission');
        return [
            'name' => [
                'required',
                'min:3',
                'max:255',
                Rule::unique('permissions', 'name')
                    ->ignore($permission->id)
            ],
        ];
    }
}
