<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\reunions;
use App\Models\expositor;


class ReunionesController extends Controller
{
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
        $expo = expositor::pluck('nombre','id');
        $opciones = ['Lunes' => 'Lunes', 'Martes' => 'Martes', 'Miercoles' => 'Miercoles', 'Jueves' => 'Jueves', 'Viernes' => 'Viernes','Sabado' => 'Sabado', 'Domingo' => 'Domingo'];
        return view('admin.reuniones.create')
        ->with('opciones',$opciones)
        ->with('expo',$expo);
        // return view('admin.reuniones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

            $request->validate([
                'dia'=> 'required',
                'hora_inicio'=> 'required|date_format:H:i',
                'hora_final'=> 'required|date_format:H:i',
                'expositor_id'=> 'required',
                'tema'=> 'required'

                ]);
                    
 
                $reunion = reunions::create($request->all());
                return redirect()->route('admin.reuniones.index', $reunion)->with('info','Se creo una nueva reunion');
    }

    public function show(reunions $reunione)
    {
        return view('admin.reuniones.show', compact('reunione'));
    }

    public function edit(reunions $reunione)
    {
        $expo = expositor::pluck('nombre','id');
        $op = ['Lunes' => 'Lunes', 'Martes' => 'Martes', 'Miercoles' => 'Miercoles', 'Jueves' => 'Jueves', 'Viernes' => 'Viernes','Sabado' => 'Sabado', 'Domingo' => 'Domingo'];
        return view('admin.reuniones.edit', compact('reunione','op','expo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,reunions $reunione)
    {
        $request->validate([
            'dia'=> 'nullable',
            'hora_inicio'=> 'required',
            'hora_final'=> 'required',
            'expositor_id'=> 'required',
            'tema'=> 'required'

        ]);
        $reunione->update($request->all());
        return redirect()->route('admin.reuniones.index', $reunione)->with('info','La reunion se actualizo correctamente');
    }

    public function destroy(reunions $reunione)
    {
        $reunione->delete();
        return redirect()->route('admin.reuniones.index')->with('info','Se elimino correctamente');
    }

}
