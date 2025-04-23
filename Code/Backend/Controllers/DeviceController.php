<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;

class DeviceController extends Controller
{
    public function getAllDevices()
    {
        return response()->json(Device::all());
    }

    public function addDevice(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string',
            'status' => 'required|string',
        ]);

        $device = Device::create($validatedData);

        return response()->json($device, 201);
    }
}
