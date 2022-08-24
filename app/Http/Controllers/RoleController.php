<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Requests\RoleStoreRequest;
use App\Http\Requests\RoleUpdateRequest;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('role_index'), 403);
        $roles = Role::paginate(5);
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('role_create'), 403);
        
        $permissions = Permission::all()->pluck('name','id');
        //dd($permissions);
        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleStoreRequest $request)
    {
        $role = Role::create($request->validated());        
        //Guardar Permisos: con el heper sync sirve para almacenar de muchos a muchos        
        //$role->permissions()->sync($request->input('permissions', [])); //lo mismo
        $role->syncPermissions($request->input('permissions', []));
        //dd($request->input('permissions', []));

        return redirect()->route('role.index')
             ->with('success', 'Rol creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        abort_if(Gate::denies('role_show'), 403);

        $role->load('permissions');
        return view('roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        abort_if(Gate::denies('role_edit'), 403);

        $permissions = Permission::all()->pluck('name', 'id');
        //cargamos los permisos relacionados ataves de la relacion muchos a muchos
        $role->load('permissions');
        //dd($role);
        return view('roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $rol
     * @return \Illuminate\Http\Response
     */
    public function update(RoleUpdateRequest $request, Role $role)
    {
        $data = $request->validated();
        $role->update($data);        
        //$role->permissions()->sync($request->input('permissions',[])); //lo mismo
        $role->syncPermissions($request->input('permissions',[]));                            

        return redirect()->route('role.show', $role)
            ->with('success', 'Rol actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $rol
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        abort_if(Gate::denies('role_destroy'), 403);

        $role->delete();

        return redirect()->route('role.index')
            ->with('success', 'Rol Eliminado corectamente');
    }
}
