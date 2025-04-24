<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    public function getAll()
    {
        return response()->json(Location::all());
    }

    public function getById($id)
    {
        $location = Location::find($id);
        if (!$location) {
            return response()->json(['error' => 'Location not found'], 404);
        }
        return response()->json($location);
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);
        $location = Location::create($validatedData);
        return response()->json($location, 201);
    }

    public function update(Request $request, $id)
    {
        $location = Location::find($id);
        if (!$location) {
            return response()->json(['error' => 'Location not found'], 404);
        }
        $validatedData = $request->validate([
            'name' => 'sometimes|string|max:255',
            'address' => 'sometimes|string|max:255',
        ]);
        $location->update($validatedData);
        return response()->json($location);
    }

    public function delete($id)
    {
        $location = Location::find($id);
        if (!$location) {
            return response()->json(['error' => 'Location not found'], 404);
        }
        $location->delete();
        return response()->json(['message' => 'Location deleted successfully']);
    }
}
