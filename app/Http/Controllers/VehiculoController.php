<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    public function index()
    {
        $vehiculos = Vehiculo::all();
        return view('vehiculo.index', compact('vehiculos'));
    }

    public function create()
    {
        return view('vehiculo.create');
    }

    public function store(Request $request)
    {
        Vehiculo::create($request->all());
        return redirect()->route('vehiculo.index');
    }

    public function show($id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        return view('vehiculo.show', compact('vehiculo'));
    }

    public function edit($id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        return view('vehiculo.edit', compact('vehiculo'));
    }

    public function update(Request $request, $id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        $vehiculo->update($request->all());
        return redirect()->route('vehiculo.index');
    }

    public function destroy($id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        $vehiculo->delete();
        return redirect()->route('vehiculo.index');
    }
}