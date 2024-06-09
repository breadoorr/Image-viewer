<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Property;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::with('type', 'area')->get();
        return view('properties.index', compact('properties'));
    }

    public function create()
    {
        $types = Type::all();
        $areas = Area::all();
        return view('properties.create', compact('types', 'areas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'published_date' => 'required|date',
            'price' => 'required|numeric',
            'type_id' => 'required|exists:types,id',
            'area_id' => 'required|exists:areas,id',
            'primary_photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $property = Property::create($request->except('primary_photo'));

        if ($request->hasFile('primary_photo')) {
            $primaryPhotoPath = $request->file('primary_photo')->store('primary_photo', 'public');
            $property->primary_photo = $primaryPhotoPath;
            $property->save();
        }

        return redirect()->route('properties.index')->with('success', 'Property created successfully.');
    }

    public function edit(Property $property)
    {
        $types = Type::all();
        $areas = Area::all();
        return view('properties.edit', compact('property', 'types', 'areas'));
    }

    public function update(Request $request, Property $property)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'published_date' => 'required|date',
            'price' => 'required|numeric',
            'type_id' => 'required|exists:types,id',
            'area_id' => 'required|exists:areas,id',
            'primary_photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $property->update($request->except('primary_photo'));

        if ($request->hasFile('primary_photo')) {
            // Delete old photo if exists
            if ($property->primary_photo) {
                Storage::delete('public/' . $property->primary_photo);
            }
            $primaryPhotoPath = $request->file('primary_photo')->store('primary_photos', 'public');
            $property->primary_photo = $primaryPhotoPath;
            $property->save();
        }

        return redirect()->route('properties.index')->with('success', 'Property updated successfully.');
    }

    public function destroy(Property $property)
    {
        if ($property->primary_photo) {
            Storage::delete('public/' . $property->primary_photo);
        }

        $property->delete();
        return redirect()->route('properties.index')->with('success', 'Property deleted successfully.');
    }
}
