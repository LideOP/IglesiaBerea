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
        $op = ['Conferencia' => 'Conferencia', 'Taller' => 'Taller', 'Actividad' => 'Actividad'];
        return view('admin.talleres.create')
        ->with('op',$op);;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=> 'nullable',
            'tipo_evento'=> 'nullable',
            'fecha'=> 'nullable',
            'lugar'=> 'nullable',
            'documento'=> 'nullable'
        ]);
        if ($request->hasFile('documento')) {
            $documento = $request->file('documento');
            $rutaDocumento = 'img/doc/';
            $filename =time();
            $uploadSuccess = $request->file('documento')->move($rutaDocumento, $filename);
            if ($uploadSuccess) {
                $taller = talleres::create([
                    'nombre' => $request->input('nombre'),
                    'tipo_evento' => $request->input('tipo_evento'),
                    'fecha' => $request->input('fecha'),
                    'lugar' => $request->input('lugar'),
                    'documento' => $rutaDocumento . $filename,
                ]);
            }
        } else {
            $taller = talleres::create($request->all());
        }

        
    //    $taller = talleres::create($request->all());
    $op = ['Conferencia' => 'Conferencia', 'Taller' => 'Taller', 'Actividad' => 'Actividad'];
        
       return redirect()->route('admin.talleres.index', $taller)
       ->with('info','Se creo una nueva reunion');
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
        $op = ['Conferencia' => 'Conferencia', 'Taller' => 'Taller', 'Actividad' => 'Actividad'];
        return view('admin.talleres.edit', compact('tallere','op'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, talleres $tallere)
    {
        $request->validate([
            'nombre' => 'nullable',
            'tipo_evento' => 'nullable',
            'fecha' => 'nullable',
            'lugar' => 'nullable',
            'documento' => 'nullable', // Asegúrate de que el campo sea de tipo imagen
        ]);

        if ($request->hasFile('documento')) {
            $documento = $request->file('documento');
            $rutaDocumento = 'img/doc/';
            $filename = time();
            $uploadSuccess = $request->file('documento')->move($rutaDocumento, $filename);

            if ($uploadSuccess) {
                // Elimina el documento existente del servidor si es necesario
                if (!empty($tallere->documento)) {
                    $this->eliminarDocumentoExistente($tallere->documento);
                }
                // Actualiza el campo 'documento' en la base de datos
                $tallere->documento = $rutaDocumento . $filename;
            }
        }

        // Actualiza el resto de los campos del taller
        $tallere->update($request->except('documento'));

        return redirect()->route('admin.talleres.index')->with('info', 'El evento se actualizó correctamente');
    }

    public function destroy(talleres $tallere)
        {
            $tallere->delete();
            return redirect()->route('admin.talleres.index')->with('info','Se elimino correctamente');
        }
    private function eliminarDocumentoExistente($documento)
        {
            // Verifica si el documento existe en el servidor y si es diferente de null
            if ($documento && file_exists(public_path($documento))) {
                // Elimina el documento existente del servidor
                unlink(public_path($documento));
            }
        }
    public function filtrarActividades(){
        $talleres = talleres::where('tipo_evento', 'Actividad')->get();
        return view('admin.talleres.acti', compact('talleres'));
    }
    public function filtrarConferencias(){
        $talleres = talleres::where('tipo_evento', 'Conferencia')->get();
        return view('admin.talleres.conferencia', compact('talleres'));
    }

    public function filtroTalleres(){
        $talleres = talleres::where('tipo_evento', 'Taller')->get();
        return view('admin.talleres.talleres', compact('talleres'));
    }
    
}
