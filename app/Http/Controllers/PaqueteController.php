<?php

namespace App\Http\Controllers;

use App\Models\Paquete;
use App\Models\Estatus;
use App\Models\Bodega;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaqueteController extends Controller
{
    public function index()
    {
        $paquetes = Paquete::with(['estatus', 'ruta', 'bodegaOrigen', 'bodegaDestino'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('paquetes.index', compact('paquetes'));
    }

    public function create()
    {
        $estatus = Estatus::all();
        $bodegas = Bodega::all();
        return view('paquetes.create', compact('estatus', 'bodegas'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'codigo' => 'required|unique:paquetes|max:50',
            'peso' => 'required|numeric|min:0',
            'dimensiones' => 'required|string|max:100',
            'descripcion' => 'required|string|max:255',
            'estatus_id' => 'required|exists:estatus,id',
            'bodega_origen_id' => 'required|exists:bodegas,id',
            'bodega_destino_id' => 'required|exists:bodegas,id|different:bodega_origen_id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            Paquete::create($request->all());
            return redirect()->route('paquetes.index')
                ->with('success', 'Paquete creado exitosamente');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error al crear el paquete')
                ->withInput();
        }
    }

    public function read($id)
    {
        try {
            $paquete = Paquete::with(['estatus', 'ruta', 'bodegaOrigen', 'bodegaDestino', 'historicos.estatus'])
                ->findOrFail($id);
            return view('paquetes.read', compact('paquete'));
        } catch (\Exception $e) {
            return redirect()->route('paquetes.index')
                ->with('error', 'Paquete no encontrado');
        }
    }

    public function edit($id)
    {
        try {
            $paquete = Paquete::findOrFail($id);
            $estatus = Estatus::all();
            $bodegas = Bodega::all();
            return view('paquetes.edit', compact('paquete', 'estatus', 'bodegas'));
        } catch (\Exception $e) {
            return redirect()->route('paquetes.index')
                ->with('error', 'Paquete no encontrado');
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'codigo' => 'required|unique:paquetes,codigo,'.$id.'|max:50',
            'peso' => 'required|numeric|min:0',
            'dimensiones' => 'required|string|max:100',
            'descripcion' => 'required|string|max:255',
            'estatus_id' => 'required|exists:estatus,id',
            'bodega_origen_id' => 'required|exists:bodegas,id',
            'bodega_destino_id' => 'required|exists:bodegas,id|different:bodega_origen_id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $paquete = Paquete::findOrFail($id);
            $paquete->update($request->all());
            return redirect()->route('paquetes.index')
                ->with('success', 'Paquete actualizado exitosamente');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error al actualizar el paquete')
                ->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $paquete = Paquete::findOrFail($id);
            $paquete->delete();
            return redirect()->route('paquetes.index')
                ->with('success', 'Paquete eliminado exitosamente');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error al eliminar el paquete');
        }
    }
}