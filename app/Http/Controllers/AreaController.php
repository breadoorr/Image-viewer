<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;

class AreaController extends Controller
{
    public function index()
    {
        $areas = Area::all();
        return view('areas.index', compact('areas'));
    }

    public function create()
    {
        return view('areas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:areas,name',
        ]);

        Area::create($request->all());
        return redirect()->route('areas.index')->with('success', 'Area created successfully.');
    }

    public function edit(Area $area)
    {
        return view('areas.edit', compact('area'));
    }

    public function update(Request $request, Area $area)
    {
        $request->validate([
            'name' => 'required|unique:areas,name,'.$area->id,
        ]);

        $area->update($request->all());
        return redirect()->route('areas.index')->with('success', 'Area updated successfully.');
    }

    public function destroy(Area $area)
    {
        foreach ($area->properties as $property) {
            $property->delete();
        }
        $area->delete();
        return redirect()->route('areas.index')->with('success', 'Area deleted successfully.');
    }
}
