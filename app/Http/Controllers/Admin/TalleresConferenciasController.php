<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\talleres;


class TalleresConferenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $talleres = talleres::all();
        return view('admin.talleres.index', compact('talleres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.talleres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo_taller'=> 'nullable',
            'titulo_conferencia'=> 'nullable',
            'fecha'=> 'nullable',
            'lugar'=> 'nullable',
            'documento'=> 'nullable|image'
        ]);
        if ($request->hasFile('documento')) {
            $documento = $request->file('documento');
            $rutaDocumento = 'img/doc/';
            $filename =time();
            $uploadSuccess = $request->file('documento')->move($rutaDocumento, $filename);
            if ($uploadSuccess) {
                $taller = talleres::create([
                    'titulo_taller' => $request->input('titulo_taller'),
                    'titulo_conferencia' => $request->input('titulo_conferencia'),
                    'fecha' => $request->input('fecha'),
                    'lugar' => $request->input('lugar'),
                    'documento' => $rutaDocumento . $filename,
                ]);
            }
        } else {
            $taller = talleres::create($request->all());
        }

        
    //    $taller = talleres::create($request->all());
       return redirect()->route('admin.talleres.index', $taller)->with('info','Se creo una nueva reunion');
    }

    public function show(talleres $tallere)
    {
        return view('admin.talleres.show', compact('tallere'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(talleres $tallere)
    {
        return view('admin.talleres.edit', compact('tallere'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, talleres $tallere)
    {
        $request->validate([
            'titulo_taller'=> 'nullable',
            'titulo_conferencia'=> 'nullable',
            'fecha'=> 'nullable',
            'lugar'=> 'nullable',
            'documento'=> 'nullable'
        ]);
        $tallere->update($request->all());
        return redirect()->route('admin.talleres.index', $tallere)->with('info','El evento se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(talleres $tallere)
    {
        $tallere->delete();
        return redirect()->route('admin.talleres.index')->with('info','Se elimino correctamente');
    }
    public function guardarTaller(Request $request)
    {
        $taller = new Taller();
        $taller->nombre = $request->input('nombre');
        // Otros campos del taller
    
        
    
        $taller->save();
    
        return redirect()->back()->with('success', 'Taller guardado con éxito');
    } 
}
