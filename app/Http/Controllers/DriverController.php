<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index()
    {
        $drivers = Driver::all();
        return view('driver.index', compact('drivers'));
    }

    public function create()
    {
        return view('driver.create');
    }

    public function store(Request $request)
    {
        Driver::create($request->all());
        return redirect()->route('driver.index');
    }

    public function show($id)
    {
        $driver = Driver::findOrFail($id);
        return view('driver.show', compact('driver'));
    }

    public function edit($id)
    {
        $driver = Driver::findOrFail($id);
        return view('driver.edit', compact('driver'));
    }

    public function update(Request $request, $id)
    {
        $driver = Driver::findOrFail($id);
        $driver->update($request->all());
        return redirect()->route('driver.index');
    }

    public function destroy($id)
    {
        $driver = Driver::findOrFail($id);
        $driver->delete();
        return redirect()->route('driver.index');
    }
}