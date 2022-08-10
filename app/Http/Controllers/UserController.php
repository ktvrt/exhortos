<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Crea un usuario nuevo
     * @return una vista de creacion de usuarios
     */
    public function create(){
        return view('user.create');
    }
}
