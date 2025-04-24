<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function getAll()
    {
        return response()->json(Role::with('users')->get()); // Include associated users
    }

    public function getById($id)
    {
        $role = Role::with('users')->find($id); // Include associated users
        if (!$role) {
            return response()->json(['error' => 'Role not found'], 404);
        }
        return response()->json($role);
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'permissions' => 'nullable|json',
        ]);
        $role = Role::create($validatedData);
        return response()->json($role, 201);
    }

    public function update(Request $request, $id)
    {
        $role = Role::find($id);
        if (!$role) {
            return response()->json(['error' => 'Role not found'], 404);
        }
        $validatedData = $request->validate([
            'name' => 'sometimes|string|max:255',
            'permissions' => 'sometimes|json',
        ]);
        $role->update($validatedData);
        return response()->json($role);
    }

    public function delete($id)
    {
        $role = Role::find($id);
        if (!$role) {
            return response()->json(['error' => 'Role not found'], 404);
        }
        $role->delete();
        return response()->json(['message' => 'Role deleted successfully']);
    }
}
