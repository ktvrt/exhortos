<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Crea un usuario nuevo
     * @return una vista de creacion de usuarios
     */
    public function create(){
        return view('user.create');
    }

    public function store(){

       $data = request()->validate([
           'name' => 'required',
           'email' => ['required','email','unique:users,email'],
           'password' => ['required','min:6'],
           'username' => 'required',
       ], [
           'name.required' => 'El campo name es obligatorio',
           'email.required' => 'El campo email es obligatorio',
           'email.email' => 'El campo email no tiene formato valido',
           'email.unique' => 'El email ya se encuentra registrado',
           'password.required' => 'El campo password es obligatorio',
           'password.min' => 'El campo :attribute minmo debe tener :min caracteres',
           'username.required' => 'El campo username es obligatorio'
       ]);

       $usuario = new User([
           'name' => $data['name'],
           'email' => $data['email'],
           'username' => $data['username'],
           'password' => bcrypt($data['password'])
       ]);
       //$profesion = Profesion::find($data['profesion_id']);
       //$usuario->profesion()->associate($profesion);
       $usuario->save();
       
       return redirect()->route('home');
   }
}
