<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MaintenanceLog;

class MaintenanceLogController extends Controller
{
    public function getAll()
    {
        return response()->json(MaintenanceLog::all());
    }

    public function getById($id)
    {
        $log = MaintenanceLog::find($id);
        if (!$log) {
            return response()->json(['error' => 'Maintenance log not found'], 404);
        }
        return response()->json($log);
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'asset_id' => 'required|exists:assets,id',
            'description' => 'required|string',
            'performed_at' => 'required|date',
        ]);
        $log = MaintenanceLog::create($validatedData);
        return response()->json($log, 201);
    }

    public function update(Request $request, $id)
    {
        $log = MaintenanceLog::find($id);
        if (!$log) {
            return response()->json(['error' => 'Maintenance log not found'], 404);
        }
        $validatedData = $request->validate([
            'asset_id' => 'sometimes|exists:assets,id',
            'description' => 'sometimes|string',
            'performed_at' => 'sometimes|date',
        ]);
        $log->update($validatedData);
        return response()->json($log);
    }

    public function delete($id)
    {
        $log = MaintenanceLog::find($id);
        if (!$log) {
            return response()->json(['error' => 'Maintenance log not found'], 404);
        }
        $log->delete();
        return response()->json(['message' => 'Maintenance log deleted successfully']);
    }
}
