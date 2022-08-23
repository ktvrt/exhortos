<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\PermissionStoreRequest;
use App\Http\Requests\PermissionUpdateRequest;
use Illuminate\Support\Facades\Gate;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('permission_index'), 403);

        $permisos = Permission::paginate(5);
        return view('permisos.index', compact('permisos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('permission_create'), 403);

        return view('permisos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionStoreRequest $request)
    {
        $permiso = Permission::create($request->validated());

        return redirect()->route('permission.index')
             ->with('success', 'Permiso creado correctamente');
    }

    /**
     * Display the specified resource.
     * NOTA: Por convencion se debe de usar como parametro el mismo nombre
     * pero en minuscula del modelo en las acciones, si no no jala el bidden:
     * @param  Permission  $permiso objeto usuario a mostrar
     * @return \Illuminate\View\View permisos.show
     */
    public function show(Permission $permission)
    {
        abort_if(Gate::denies('permission_show'), 403);

        //$permiso = Permission::findOrFail($id);
        //dd($permission);
        return view('permisos.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        abort_if(Gate::denies('permission_edit'), 403);

        return view('permisos.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionUpdateRequest $request, Permission $permission)
    {
        $data = $request->validated();
        $permission->update($data);

        return redirect()->route('permission.show', $permission)
            ->with('success', 'Permiso actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        abort_if(Gate::denies('permission_destroy'), 403);

        $permission->delete();

        return redirect()->route('permission.index')
            ->with('success', 'Permiso Eliminado corectamente');
    }
}
