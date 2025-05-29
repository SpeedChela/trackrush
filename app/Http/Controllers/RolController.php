<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function index()
    {
        $roles = Rol::all();
        return view('rol.index', compact('roles'));
    }

    public function create()
    {
        return view('rol.create');
    }

    public function store(Request $request)
    {
        Rol::create($request->all());
        return redirect()->route('rol.index');
    }

    public function show($id)
    {
        $rol = Rol::findOrFail($id);
        return view('rol.show', compact('rol'));
    }

    public function edit($id)
    {
        $rol = Rol::findOrFail($id);
        return view('rol.edit', compact('rol'));
    }

    public function update(Request $request, $id)
    {
        $rol = Rol::findOrFail($id);
        $rol->update($request->all());
        return redirect()->route('rol.index');
    }

    public function destroy($id)
    {
        $rol = Rol::findOrFail($id);
        $rol->delete();
        return redirect()->route('rol.index');
    }
}