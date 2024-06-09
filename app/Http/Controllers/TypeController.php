<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::all();
        return view('types.index', compact('types'));
    }

    public function create()
    {
        return view('types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:types,name',
        ]);

        Type::create($request->all());
        return redirect()->route('types.index')->with('success', 'Type created successfully.');
    }

    public function edit(Type $type)
    {
        return view('types.edit', compact('type'));
    }

    public function update(Request $request, Type $type)
    {
        $request->validate([
            'name' => 'required|unique:types,name,'.$type->id,
        ]);

        $type->update($request->all());
        return redirect()->route('types.index')->with('success', 'Type updated successfully.');
    }

    public function destroy(Type $type)
    {
        // Delete associated properties first
        foreach ($type->properties as $property) {
            $property->delete();
        }

        // Delete the type
        $type->delete();

        return redirect()->route('types.index')->with('success', 'Type and associated properties deleted successfully.');
    }

}
