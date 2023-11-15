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
        $opciones = ['Pastor' => 'Pastor', 'Seminarista' => 'Seminarista', 'Externo' => 'Externo'];
        return view('admin.expositores.create', compact('opciones'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=> 'required',
            'cargo'=> 'required',
            'telefono'=> 'required|numeric',
            'foto'=> 'nullable'
        ]);
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $rutaDocumento = 'img/fotosExpositores/';
            $filename =time();
            $uploadSuccess = $request->file('foto')->move($rutaDocumento, $filename);
            if ($uploadSuccess) {
                $expositor = expositor::create([
                    'nombre' => $request->input('nombre'),
                    'cargo' => $request->input('cargo'),
                    'telefono' => $request->input('telefono'),
                    'foto' => $rutaDocumento . $filename,
                ]);
            }
        } else {
            $expositor = expositor::create($request->all());
        }
       return redirect()->route('admin.expositores.index', $expositor)->with('info','Se aniadio un nuevo expositor');
    }
    public function show(expositor $expositore)
    {
        return view('admin.expositores.show', compact('expositore'));

    }
    public function edit(expositor $expositore)
    {
        $op = ['Pastor' => 'Pastor', 'Seminarista' => 'Seminarista', 'Externo' => 'Externo'];
        return view('admin.expositores.edit', compact('expositore', 'op'));
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
            'foto'=> 'required'

        ]);
        $fotoAnterior = $expositore->foto;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $rutaDocumento = 'img/fotosExpositores/';
            $filename =time();
            $uploadSuccess = $request->file('foto')->move($rutaDocumento, $filename);
            if ($uploadSuccess) {
                if (!empty($expositore->foto)) {
                    $this->eliminarFotoExistente($expositore->foto);
                }
                $expositore->foto = $rutaDocumento . $filename;
            }
        }

       $expositore->update($request->except('foto'));
       return redirect()->route('admin.expositores.index')->with('info','Se actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(expositor $expositore)
    {
        $expositore->delete();
        return redirect()->route('admin.expositores.index')->with('info','Se elimino correctamente');

    }
    private function eliminarFotoExistente($foto)
        {
            // Verifica si el documento existe en el servidor y si es diferente de null
            if ($foto && file_exists(public_path($foto))) {
                // Elimina el documento existente del servidor
                unlink(public_path($foto));
            }
        }

}
