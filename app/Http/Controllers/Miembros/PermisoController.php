<?php

namespace App\Http\Controllers\miembros;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permisos = Permission::all();
        return view('admin.users.permisos',compact('permisos'));
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
        $validacion = $request->validate([
            'permiso' => 'required|string',
        ]);

        $permission = Permission::create(['name'=> $request->input('permiso')]);
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
    public function edit(string $id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validacion = $request->validate([
            'permiso' => 'required|string',
        ]);
        
        // $permiso = Permission::find($id);
        // $permiso->name = $validacion['permiso'];
        // $permiso->save();
        return response()->json($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $permiso = Permission::find($id);
        $permiso->delete();

        return back()->with('message','ok');
    }
}
