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
        if ($request->hasFile('documento')) {
            $documento = $request->file('documento');
            $rutaDocumento = 'img/doc/';
            $filename =time();
            $uploadSuccess = $request->file('documento')->move($rutaDocumento, $filename);
            if ($uploadSuccess) {
                $actividad = actividades::create([
                    'nombre' => $request->input('nombre'),
                    'lugar' => $request->input('lugar'),
                    'fecha' => $request->input('fecha'),
                    'documento' => $rutaDocumento . $filename,
                ]);
            }
        } else {
            $actividad = actividades::create($request->all());
        }

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
        if ($request->hasFile('documento')) {
            $documento = $request->file('documento');
            $rutaDocumento = 'img/doc/';
            $filename = time();
            $uploadSuccess = $request->file('documento')->move($rutaDocumento, $filename);
    
            if ($uploadSuccess) {
                // Elimina el documento existente del servidor si es necesario
                if (!empty($actividade->documento)) {
                    $this->eliminarDocumentoExistente($actividade->documento);
                }
                // Actualiza el campo 'documento' en la base de datos
                $actividade->documento = $rutaDocumento . $filename;
            }
        }
    
        $actividade->update($request->except('documento'));
        return redirect()->route('admin.actividades.index')->with('info','Se actualizo correctamente');
    }
    public function destroy(actividades $actividade)
    {
        $actividade->delete();
        return redirect()->route('admin.actividades.index')->with('info','Se elimino correctamente');
    }
    private function eliminarDocumentoExistente($actividade)
    {
        // Verifica si el documento existe en el servidor y si es diferente de null
        if ($actividade && file_exists(public_path($actividade))) {
            // Elimina el documento existente del servidor
            unlink(public_path($actividade));
        }
    }
}
