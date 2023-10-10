<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\reunions;

class ReunionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reuniones = reunions::all();
        return view('admin.reuniones.index', compact('reuniones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.reuniones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
             'dia'=> 'required',
             'hora_inicio'=> 'required',
             'hora_final'=> 'required',
             'expositor'=> 'required',
             'tema'=> 'required'

         ]);
        //  return $request->all();
        $reunion = reunions::create($request->all());
        return redirect()->route('admin.reuniones.index', $reunion)->with('info','Se creo una nueva reunion');

    }

    /**
     * Display the specified resource.
     */
    public function show(reunions $reunione)
    {
        return view('admin.reuniones.show', compact('reunione'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(reunions $reunione)
    {
        return view('admin.reuniones.edit', compact('reunione'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,reunions $reunione)
    {
        $request->validate([
            'dia'=> 'required',
            'hora_inicio'=> 'required',
            'hora_final'=> 'required',
            'expositor'=> 'required',
            'tema'=> 'required'

        ]);
        $reunione->update($request->all());
        return redirect()->route('admin.reuniones.index', $reunione)->with('info','La reunion se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(reunions $reunione)
    {
        $reunione->delete();
        return redirect()->route('admin.reuniones.index')->with('info','Se elimino correctamente');
    }
}
