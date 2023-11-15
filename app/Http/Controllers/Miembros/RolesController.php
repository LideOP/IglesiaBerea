<?php

namespace App\Http\Controllers\miembros;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    

    public function __construct()
    {
        $this->middleware('can:administrador usuario');
    }
    
    public function index()
    {
        $roles = Role::all();
        return view('admin.users.roles', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $role = Role::create(['name'=> $request->input('nombre')]);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)//(string $id)
    {
        //$role = Role::find($id);
        $permisos = Permission::all();
        return view('admin.users.rolePermiso',compact('role','permisos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        //
        $role->permissions()->sync($request->permisos);

        return redirect()->route('admin.roles.edit', $role);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rol = Role::find($id);
        
        $rol->delete();
        return back()->with('message','ok');
    }
}
