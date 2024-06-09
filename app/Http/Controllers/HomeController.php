<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Type;
use App\Models\Area;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $typeId = $request->input('type');
        $areaId = $request->input('area');

        $query = Property::query();

        if ($typeId) {
            $query->where('type_id', $typeId);
        }

        if ($areaId) {
            $query->where('area_id', $areaId);
        }

        $properties = $query->with('type', 'area')->get();
        $types = Type::all();
        $areas = Area::all();

        return view('home', compact('properties', 'types', 'areas', 'typeId', 'areaId'));
    }
}
