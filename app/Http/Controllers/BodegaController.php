<?php

namespace App\Http\Controllers;

use App\Models\Bodega;
use App\Models\Municipio;
use App\Models\Estatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BodegaController extends Controller
{
    public function index()
    {
        $bodegas = Bodega::with(['municipio.entidad', 'estatus'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('bodegas.index', compact('bodegas'));
    }

    public function create()
    {
        $municipios = Municipio::with('entidad')->get();
        $estatus = Estatus::all();
        return view('bodegas.create', compact('municipios', 'estatus'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:100',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'email' => 'required|email|max:100',
            'municipio_id' => 'required|exists:municipios,id',
            'estatus_id' => 'required|exists:estatus,id'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            Bodega::create($request->all());
            return redirect()->route('bodegas.index')
                ->with('success', 'Bodega creada exitosamente');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error al crear la bodega')
                ->withInput();
        }
    }

    public function read($id)
    {
        try {
            $bodega = Bodega::with(['municipio.entidad', 'estatus', 'paquetesOrigen', 'paquetesDestino'])
                ->findOrFail($id);
            return view('bodegas.read', compact('bodega'));
        } catch (\Exception $e) {
            return redirect()->route('bodegas.index')
                ->with('error', 'Bodega no encontrada');
        }
    }

    public function edit($id)
    {
        try {
            $bodega = Bodega::findOrFail($id);
            $municipios = Municipio::with('entidad')->get();
            $estatus = Estatus::all();
            return view('bodegas.edit', compact('bodega', 'municipios', 'estatus'));
        } catch (\Exception $e) {
            return redirect()->route('bodegas.index')
                ->with('error', 'Bodega no encontrada');
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:100',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'email' => 'required|email|max:100',
            'municipio_id' => 'required|exists:municipios,id',
            'estatus_id' => 'required|exists:estatus,id'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $bodega = Bodega::findOrFail($id);
            $bodega->update($request->all());
            return redirect()->route('bodegas.index')
                ->with('success', 'Bodega actualizada exitosamente');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error al actualizar la bodega')
                ->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $bodega = Bodega::findOrFail($id);
            
            // Verificar si hay paquetes asociados
            if ($bodega->paquetesOrigen()->count() > 0 || $bodega->paquetesDestino()->count() > 0) {
                return redirect()->back()
                    ->with('error', 'No se puede eliminar la bodega porque tiene paquetes asociados');
            }
            
            $bodega->delete();
            return redirect()->route('bodegas.index')
                ->with('success', 'Bodega eliminada exitosamente');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error al eliminar la bodega');
        }
    }
}