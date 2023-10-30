<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\expositor;

class ExpositoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
            $expositor = expositor::all();
            return view('admin.expositores.index', compact('expositor'));
        }
    }
    public function create()
    {
        return view('admin.expositores.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=> 'required',
            'cargo'=> 'required',
            'telefono'=> 'required|numeric',
        ]);
       $expositor = expositor::create($request->all());
       return redirect()->route('admin.expositores.index', $expositor)->with('info','Se aniadio un nuevo expositor');
    }
    public function show(expositor $expositore)
    {
        return view('admin.expositores.show', compact('expositore'));

    }
    public function edit(expositor $expositore)
    {
        return view('admin.expositores.edit', compact('expositore'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, expositor $expositore)
    {
        $request->validate([
            'nombre'=> 'required',
            'cargo'=> 'required',
            'telefono'=> 'required|numeric',

        ]);
       $expositore->update($request->all());
       return redirect()->route('admin.expositores.index', $expositore)->with('info','Se actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(expositor $expositore)
    {
        $expositore->delete();
        return redirect()->route('admin.expositores.index')->with('info','Se elimino correctamente');

    }

}
