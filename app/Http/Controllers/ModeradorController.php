<?php

namespace App\Http\Controllers;

use App\Models\Moderador;
use Illuminate\Http\Request;

class ModeradorController extends Controller
{
    public function index()
    {
        $moderadores = Moderador::all();
        return view('moderador.index', compact('moderadores'));
    }

    public function create()
    {
        return view('moderador.create');
    }

    public function store(Request $request)
    {
        Moderador::create($request->all());
        return redirect()->route('moderador.index');
    }

    public function show($id)
    {
        $moderador = Moderador::findOrFail($id);
        return view('moderador.show', compact('moderador'));
    }

    public function edit($id)
    {
        $moderador = Moderador::findOrFail($id);
        return view('moderador.edit', compact('moderador'));
    }

    public function update(Request $request, $id)
    {
        $moderador = Moderador::findOrFail($id);
        $moderador->update($request->all());
        return redirect()->route('moderador.index');
    }

    public function destroy($id)
    {
        $moderador = Moderador::findOrFail($id);
        $moderador->delete();
        return redirect()->route('moderador.index');
    }
}