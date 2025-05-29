<?php

namespace App\Http\Controllers;

use App\Models\Entidades;
use App\Models\Paises;
use Illuminate\Http\Request;

class EntidadController extends Controller
{
    public function index()
    {
        $entidades = Entidades::all();
        return view('Entidades.index', compact('entidades'));
    }
public function create()
{
    $paises = Paises::all(); // Obtener todos los países
    return view('Entidades.create', compact('paises')); // Pasar la variable a la vista
}

    public function store(Request $request)
    {
        Entidades::create($request->all());
        return redirect()->route('Entidades.index');
    }

    public function show($id)
    {
        $entidad = Entidades::findOrFail($id);
        return view('Entidades.read', compact('entidad'));
    }

    public function edit($id)
    {
        $entidad = Entidades::findOrFail($id);
        return view('Entidades.edit', compact('entidad'));
    }

    public function update(Request $request, $id)
    {
        $entidad = Entidades::findOrFail($id);
        $entidad->update($request->all());
        return redirect()->route('Entidades.index');
    }

    public function destroy($id)
    {
        $entidad = Entidades::findOrFail($id);
        $entidad->delete();
        return redirect()->route('Entidades.index');
    }
}