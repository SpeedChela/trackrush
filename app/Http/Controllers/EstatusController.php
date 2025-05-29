<?php

namespace App\Http\Controllers;

use App\Models\Estatus;
use Illuminate\Http\Request;

class EstatusController extends Controller
{
    public function index()
    {
        $estatus = Estatus::all();
        return view('estatus.index', compact('estatus'));
    }

    public function create()
    {
        return view('estatus.create');
    }

    public function store(Request $request)
    {
        Estatus::create($request->all());
        return redirect()->route('estatus.index');
    }

    public function show($id)
    {
        $estatus = Estatus::findOrFail($id);
        return view('estatus.show', compact('estatus'));
    }

    public function edit($id)
    {
        $estatus = Estatus::findOrFail($id);
        return view('estatus.edit', compact('estatus'));
    }

    public function update(Request $request, $id)
    {
        $estatus = Estatus::findOrFail($id);
        $estatus->update($request->all());
        return redirect()->route('estatus.index');
    }

    public function destroy($id)
    {
        $estatus = Estatus::findOrFail($id);
        $estatus->delete();
        return redirect()->route('estatus.index');
    }
}