<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use Illuminate\Http\Request;

class MunicipioController extends Controller
{
    public function index()
    {
        $municipios = Municipio::all();
        return view('municipio.index', compact('municipios'));
    }

    public function create()
    {
        return view('municipio.create');
    }

    public function store(Request $request)
    {
        Municipio::create($request->all());
        return redirect()->route('municipio.index');
    }

    public function show($id)
    {
        $municipio = Municipio::findOrFail($id);
        return view('municipio.show', compact('municipio'));
    }

    public function edit($id)
    {
        $municipio = Municipio::findOrFail($id);
        return view('municipio.edit', compact('municipio'));
    }

    public function update(Request $request, $id)
    {
        $municipio = Municipio::findOrFail($id);
        $municipio->update($request->all());
        return redirect()->route('municipio.index');
    }

    public function destroy($id)
    {
        $municipio = Municipio::findOrFail($id);
        $municipio->delete();
        return redirect()->route('municipio.index');
    }
}