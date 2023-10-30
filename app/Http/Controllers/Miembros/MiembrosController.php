<?php

namespace App\Http\Controllers\Miembros;

use App\Http\Controllers\Controller;
use App\Models\Miembro;
use Illuminate\Http\Request;

class MiembrosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $miembros = Miembro::all();
        return view('admin.miembros.index',compact('miembros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.miembros.create');
    }




    public function registrar(Request $request){
        $miembros = Miembro::all();
        return view('admin.miembros.index',compact('miembros'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=> 'required',
            'apellidos'=> 'required',
            'ci'=> 'required',
            'telefono'=> 'required',
            'fecha_nac'=> 'required',
            'direccion'=> 'required'

        ]);
        $miembro = Miembro::create($request->all());
        return redirect()->route('admin.miembros.index', $miembro)->with('info','Se creo un miembro nuevo');

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
    public function edit(Miembro $miembro)
    {
        return view('admin.miembros.edit', compact('miembro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Miembro $miembro)
    {
        $request->validate([
            'nombre'=> 'required',
            'apellidos'=> 'required',
            'ci'=> 'required',
            'telefono'=> 'required',
            'fecha_nac'=> 'required',
            'direccion'=> 'required'
        ]);

        $miembro->update($request->all());
        return redirect()->route('admin.miembros.index', $miembro)->with('info','La reunion se actualizo correctamente');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Miembro $miembro)
    {
        $miembro->delete();
        return redirect()->route('admin.miembros.index', $miembro)->with('info','Se eliminó correctamente');
    }
}
