<?php

namespace App\Http\Controllers;

use App\Models\Asignar_ruta;
use Illuminate\Http\Request;

class AsignarRutaController extends Controller
{
    public function index()
    {
        $asignarRutas = Asignar_ruta::all();
        return view('Asignar_ruta.index', compact('asignarRutas'));
    }

    public function create()
    {
        return view('Asignar_ruta.create');
    }

    public function store(Request $request)
    {
        Asignar_ruta::create($request->all());
        return redirect()->route('Asignar_ruta.index');
    }

    public function show($id)
    {
        $asignarRuta = Asignar_ruta::findOrFail($id);
        return view('Asignar_ruta.read', compact('asignarRuta'));
    }

    public function edit($id)
    {
        $asignarRuta = Asignar_ruta::findOrFail($id);
        return view('Asignar_ruta.edit', compact('asignarRuta'));
    }

    public function update(Request $request, $id)
    {
        $asignarRuta = Asignar_ruta::findOrFail($id);
        $asignarRuta->update($request->all());
        return redirect()->route('Asignar_ruta.index');
    }

    public function destroy($id)
    {
        $asignarRuta = Asignar_ruta::findOrFail($id);
        $asignarRuta->delete();
        return redirect()->route('Asignar_ruta.index');
    }
}