<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;

class AssetController extends Controller
{
    public function getAll()
    {
        return response()->json(Asset::all());
    }

    public function getById($id)
    {
        $asset = Asset::find($id);
        if (!$asset) {
            return response()->json(['error' => 'Asset not found'], 404);
        }
        return response()->json($asset);
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|string',
        ]);
        $asset = Asset::create($validatedData);
        return response()->json($asset, 201);
    }

    public function update(Request $request, $id)
    {
        $asset = Asset::find($id);
        if (!$asset) {
            return response()->json(['error' => 'Asset not found'], 404);
        }
        $validatedData = $request->validate([
            'name' => 'sometimes|string|max:255',
            'category_id' => 'sometimes|exists:categories,id',
            'status' => 'sometimes|string',
        ]);
        $asset->update($validatedData);
        return response()->json($asset);
    }

    public function delete($id)
    {
        $asset = Asset::find($id);
        if (!$asset) {
            return response()->json(['error' => 'Asset not found'], 404);
        }
        $asset->delete();
        return response()->json(['message' => 'Asset deleted successfully']);
    }
}
