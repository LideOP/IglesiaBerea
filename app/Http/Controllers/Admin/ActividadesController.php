<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\actividades;


class ActividadesController extends Controller
{
    public function index()
    {
        $actividad = actividades::all();
        return view('admin.actividades.index', compact('actividad'));
    }
    public function create()
    {
        return view('admin.actividades.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=> 'nullable',
            'lugar'=> 'nullable',
            'fecha'=> 'nullable',
            'documento'=> 'nullable'
        ]);
        $actividad = actividades::create($request->all());
        return redirect()->route('admin.actividades.index', $actividad)->with('info','Se creo una nueva actividad');
    }

    public function show(actividades $actividade)
    {
        return view('admin.actividades.show', compact('actividade'));

    }

    public function edit(actividades $actividade)
    {
        return view('admin.actividades.edit', compact('actividade'));
    }

    public function update(Request $request, actividades $actividade)
    {
        $request->validate([
            'nombre'=> 'nullable',
            'lugar'=> 'nullable',
            'fecha'=> 'nullable',
            'documento'=> 'nullable'
        ]);
        $actividade->update($request->all());
        return redirect()->route('admin.actividades.index', $actividade)->with('info','Se actualizo correctamente');
    }
    public function destroy(actividades $actividade)
    {
        $actividade->delete();
        return redirect()->route('admin.actividades.index')->with('info','Se elimino correctamente');
    }
}
