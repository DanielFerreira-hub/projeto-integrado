<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    public function getAll()
    {
        return response()->json(Room::all());
    }

    public function getById($id)
    {
        $room = Room::find($id);
        if (!$room) {
            return response()->json(['error' => 'Room not found'], 404);
        }
        return response()->json($room);
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'location_id' => 'required|exists:locations,id',
        ]);
        $room = Room::create($validatedData);
        return response()->json($room, 201);
    }

    public function update(Request $request, $id)
    {
        $room = Room::find($id);
        if (!$room) {
            return response()->json(['error' => 'Room not found'], 404);
        }
        $validatedData = $request->validate([
            'name' => 'sometimes|string|max:255',
            'location_id' => 'sometimes|exists:locations,id',
        ]);
        $room->update($validatedData);
        return response()->json($room);
    }

    public function delete($id)
    {
        $room = Room::find($id);
        if (!$room) {
            return response()->json(['error' => 'Room not found'], 404);
        }
        $room->delete();
       
