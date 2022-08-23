<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
    * visualizar Usuarios
    * @return \Illuminate\View\View Lista de usuarios
    */
    public function index(){
        abort_if(Gate::denies('user_index'), 403);
        //$usuarios = User::all();
        $usuarios = User::paginate(3);

        //lanzamos la vista view/user/index.blade.php
        //y le pasamos parametros que ocupa
        //como es ['<nombre-variable>' => <valores>]
        /* Lo mismo
        return view('user.index',[
                'usuarios' => $usuarios,
                'titulo' => $titulo
          ]);
          */
          return view('user.index',compact('usuarios'));
    }

    /**
     * Crea un usuario nuevo
     * @return una vista de creacion de usuarios
     */
    public function create(){
        abort_if(Gate::denies('user_create'), 403);
        $roles = Role::all()->pluck('name','id');
        return view('user.create', compact('roles'));
    }

    public function store(UserStoreRequest $request){

        /*
       $data = request()->validate([
           'name' => 'required',
           'email' => ['required','email','unique:users,email'],
           'password' => ['required','min:6','max:255'],
           'username' => ['required','min:5','max:255','unique:users,username'],
       ], [
           'name.required' => 'El campo name es obligatorio',
           'email.required' => 'El campo email es obligatorio',
           'email.email' => 'El campo email no tiene formato valido',
           'email.unique' => 'El email ya se encuentra registrado',
           'password.required' => 'El campo password es obligatorio',
           'password.min' => 'El campo :attribute minmo debe tener :min caracteres',
           'username.required' => 'El campo username es obligatorio',
           'username.unique' => 'El username ya se encuentra en uso por otro usuario'
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
       */

       $usuario = User::create([
           'name' => $request['name'],
           'email' => $request['email'],
           'username' => $request['username'],
           'password' => bcrypt($request['password'])
       ]);

       $roles = $request->input('roles', []);
       //Guardar los roles asignados: usando la relacion muchos a muchos
       //$usuario->sync($roles); //Lo mismo pero mejor lo dejamos como vien en la doc de spaty
       $usuario->syncRoles($roles);

       return redirect()->route('user.show', $usuario)
            ->with('success', 'Usuario creado correctamente');
   }

   /**
     * Show the profile for a given user.
     *
     * @param  User  $usuario objeto usuario a mostrar
     * @return \Illuminate\View\View usr.show
     */
    public function show(User $usuario){
        abort_if(Gate::denies('user_show'), 403);
        //$usuario->load('roles');
        //dd($usuario); //vemosel usuario objeto
      return view('user.show', compact('usuario'));
    }
    /**
     * Lanza vista para editar usuario
     * @param  User   $usuario               Modelo
     * @return View          user.edit
     */
    public function edit(User $usuario){
        abort_if(Gate::denies('user_edit'), 403);
        $roles = Role::all()->pluck('name', 'id');
        //$usuarios->load('roles');

        return view('user.edit', compact('usuario', 'roles'));

    }

    /**
     * Actualiza los datos del usuario en la BD
     * @param  User   $usuario               Modelo
     * @return view          redirecciona a la vista user.show
     */
    public function update(UserUpdateRequest $request, User $usuario)
    {
        /*
        $data = request()->validate([
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')
                    ->ignore($usuario->id)
            ],
            'password' => 'sometime',
            //'username' => 'required',
            'username' => [
                'required',
                'min:5',
                'max:255',
                Rule::unique('users', 'username')
                    ->ignore($usuario->id)
            ],
        ], [
            'name.required' => 'El campo name es obligatorio',
            'email.required' => 'El campo email es obligatorio',
            'email.email' => 'El campo email no tiene formato valido',
            'email.unique' => 'El email ya se encuentra registrado',
            'username.required' => 'El campo username es obligatorio',
            'username.unique' => 'El username ya esta en uso por otro usuario',
        ]);
        //dd($data);
        if ( is_null($data['password']) ) {
            unset($data['password']);
        } else {
            $data['password'] = bcrypt($data['password']);
        }

        //$profesion = Profesion::find($data['profesion_id']);
        //$usuario->profesion()->associate($profesion);

        $usuario->update($data);
        */

        $data = $request->only('name', 'username', 'email','password');

        if ( is_null($data['password']) ) {
            unset($data['password']);
        } else {
            $data['password'] = bcrypt($data['password']);
        }

        //$profesion = Profesion::find($data['profesion_id']);
        //$usuario->profesion()->associate($profesion);

        $usuario->update($data);
        $roles = $request->input('roles');
        $usuario->syncRoles($roles);

        return redirect()->route('user.show', $usuario)
                    ->with('success', 'Usuario actualizado correctamente');
    }

    /**
     * Eliminar usuario
     * @param  User   $usuario               Modelo
     * @return view          usr.index
     */
    public function destroy(User $usuario){
        abort_if(Gate::denies('user_destroy'), 403);

        if (auth()->user()->id == $usuario->id) {
            return redirect()->route('user.index')
                ->with('success', 'Usuario no puede ser eliminado; por sesión activa');
        }
        //llamamos al metodo delete() para eliminar el usuarios
        $usuario->delete();

        return redirect()->route('user.index')
            ->with('success', 'Usuario eliminado correctamente');
    }
}
