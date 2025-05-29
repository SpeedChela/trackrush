<?php

namespace App\Http\Controllers;

use App\Models\Historico;
use Illuminate\Http\Request;

class HistoricoController extends Controller
{
    public function index()
    {
        $historicos = Historico::all();
        return view('historico.index', compact('historicos'));
    }

    public function create()
    {
        return view('historico.create');
    }

    public function store(Request $request)
    {
        Historico::create($request->all());
        return redirect()->route('historico.index');
    }

    public function show($id)
    {
        $historico = Historico::findOrFail($id);
        return view('historico.show', compact('historico'));
    }

    public function edit($id)
    {
        $historico = Historico::findOrFail($id);
        return view('historico.edit', compact('historico'));
    }

    public function update(Request $request, $id)
    {
        $historico = Historico::findOrFail($id);
        $historico->update($request->all());
        return redirect()->route('historico.index');
    }

    public function destroy($id)
    {
        $historico = Historico::findOrFail($id);
        $historico->delete();
        return redirect()->route('historico.index');
    }
}