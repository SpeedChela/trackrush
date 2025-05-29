<?php

namespace App\Http\Controllers;

use App\Models\Paquete;
use Illuminate\Http\Request;

class PaqueteController extends Controller
{
    public function index()
    {
        $paquetes = Paquete::all();
        return view('paquete.index', compact('paquetes'));
    }

    public function create()
    {
        return view('paquete.create');
    }

    public function store(Request $request)
    {
        Paquete::create($request->all());
        return redirect()->route('paquete.index');
    }

    public function show($id)
    {
        $paquete = Paquete::findOrFail($id);
        return view('paquete.show', compact('paquete'));
    }

    public function edit($id)
    {
        $paquete = Paquete::findOrFail($id);
        return view('paquete.edit', compact('paquete'));
    }

    public function update(Request $request, $id)
    {
        $paquete = Paquete::findOrFail($id);
        $paquete->update($request->all());
        return redirect()->route('paquete.index');
    }

    public function destroy($id)
    {
        $paquete = Paquete::findOrFail($id);
        $paquete->delete();
        return redirect()->route('paquete.index');
    }
}