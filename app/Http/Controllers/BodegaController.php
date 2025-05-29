<?php

namespace App\Http\Controllers;

use App\Models\Bodega;
use Illuminate\Http\Request;

class BodegaController extends Controller
{
    public function index()
    {
        $bodegas = Bodega::all();
        return view('bodega.index', compact('bodegas'));
    }

    public function create()
    {
        return view('bodega.create');
    }

    public function store(Request $request)
    {
        Bodega::create($request->all());
        return redirect()->route('bodega.index');
    }

    public function show($id)
    {
        $bodega = Bodega::findOrFail($id);
        return view('bodega.show', compact('bodega'));
    }

    public function edit($id)
    {
        $bodega = Bodega::findOrFail($id);
        return view('bodega.edit', compact('bodega'));
    }

    public function update(Request $request, $id)
    {
        $bodega = Bodega::findOrFail($id);
        $bodega->update($request->all());
        return redirect()->route('bodega.index');
    }

    public function destroy($id)
    {
        $bodega = Bodega::findOrFail($id);
        $bodega->delete();
        return redirect()->route('bodega.index');
    }
}