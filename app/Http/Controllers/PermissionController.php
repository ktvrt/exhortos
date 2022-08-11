<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\PermissionStoreRequest;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
     * @param  Permission  $permiso objeto usuario a mostrar
     * @return \Illuminate\View\View permisos.show
     */
    public function show($id)
    {

        $permiso = Permission::findOrFail($id);

        //dd($permiso);
        return view('permisos.show', compact('permiso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
