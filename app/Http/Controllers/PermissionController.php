<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $permissions = Permission::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%$search%");
        })->get(); // No pagination

        return view('permission.index', compact('permissions', 'search'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:255',
        ]);

        Permission::create([
            'name' => $request->name,
            'guard_name' => 'web',
            'deskripsi' => $request->deskripsi,
        ]);

        return response()->json([
            'success' => 'Permission berhasil ditambahkan.',
        ]);
    }

    // Updated method for AJAX Update functionality
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:255',
        ]);

        $permission = Permission::findOrFail($id);

        // Update permission data
        $permission->update([
            'name' => $request->name,
            'deskripsi' => $request->deskripsi,
        ]);

        // Return a success response
        return response()->json([
            'success' => 'Permission berhasil diperbarui.',
        ]);
    }

    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();

        return response()->json([
            'success' => 'Permission berhasil dihapus.',
        ]);
    }

    public function destroySelected(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:permissions,id',
        ]);

        Permission::whereIn('id', $request->ids)->delete();

        return response()->json([
            'success' => 'Permissions berhasil dihapus.',
        ]);
    }
}
