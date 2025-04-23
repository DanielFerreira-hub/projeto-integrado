<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assignment;

class AssignmentController extends Controller
{
    public function getAll()
    {
        return response()->json(Assignment::all());
    }

    public function getById($id)
    {
        $assignment = Assignment::find($id);
        if (!$assignment) {
            return response()->json(['error' => 'Assignment not found'], 404);
        }
        return response()->json($assignment);
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'asset_id' => 'required|exists:assets,id',
            'user_id' => 'required|exists:users,id',
            'assigned_at' => 'required|date',
        ]);
        $assignment = Assignment::create($validatedData);
        return response()->json($assignment, 201);
    }

    public function update(Request $request, $id)
    {
        $assignment = Assignment::find($id);
        if (!$assignment) {
            return response()->json(['error' => 'Assignment not found'], 404);
        }
        $validatedData = $request->validate([
            'asset_id' => 'sometimes|exists:assets,id',
            'user_id' => 'sometimes|exists:users,id',
            'assigned_at' => 'sometimes|date',
        ]);
        $assignment->update($validatedData);
        return response()->json($assignment);
    }

    public function delete($id)
    {
        $assignment = Assignment::find($id);
        if (!$assignment) {
            return response()->json(['error' => 'Assignment not found'], 404);
        }
        $assignment->delete();
        return response()->json(['message' => 'Assignment deleted successfully']);
    }
}
