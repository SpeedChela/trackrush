<?php

namespace App\Http\Controllers;

use App\Models\Paises;
use Illuminate\Http\Request;

class PaisController extends Controller
{
    public function index()
    {
        $paises = Paises::all();
        return view('Paises.index', compact('paises'));
    }

    public function create()
    {
        return view('Paises.create');
    }

    public function store(Request $request)
    {
        Paises::create($request->all());
        return redirect()->route('Paises.index');
    }

    public function show($id)
    {
        $pais = Paises::findOrFail($id);
        return view('Paises.read', compact('pais'));
    }

    public function edit($id)
    {
        $pais = Paises::findOrFail($id);
        return view('Paises.edit', compact('pais'));
    }

    public function update(Request $request, $id)
    {
        $pais = Paises::findOrFail($id);
        $pais->update($request->all());
        return redirect()->route('Paises.index');
    }

    public function destroy($id)
    {
        $pais = Paises::findOrFail($id);
        $pais->delete();
        return redirect()->route('Paises.index');
    }
}