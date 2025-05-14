<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasPermissions;

class RoleController extends Controller
{
    use HasPermissions;

    /**
     * Menampilkan daftar role.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $roles = Role::all();
        return view('role.index', compact('roles'));
    }

    /**
     * Menyimpan role baru.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
        ]);

        Role::create([
            'name' => $request->name,
            'guard_name' => 'web',
        ]);

        return redirect()->route('role.index')->with('success', 'Role berhasil ditambahkan.');
    }

    /**
     * Memperbarui role yang ada.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $role = Role::findOrFail($id);
        $role->update([
            'name' => $request->name,
            'guard_name' => 'web',
        ]);

        return redirect()->route('role.index')->with('success', 'Role berhasil diperbarui.');
    }

    /**
     * Menghapus role berdasarkan ID.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        if ($role->permissions()->count() > 0) {
            return response()->json([
                'error' => 'Role tidak dapat dihapus karena memiliki permissions.'
            ], 400);
        }

        $role->delete();

        return response()->json([
            'success' => 'Role berhasil dihapus.'
        ]);
    }

    /**
     * Menampilkan halaman pengaturan permission untuk role tertentu.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function rolePermissions($id)
    {
        // Mengambil role beserta permissions (gunakan findOrFail untuk keamanan)
        $roleById = Role::with('permissions')->findOrFail($id);

        // Mengambil semua permissions
        $allPermissions = Permission::all();

        // Mengumpulkan ID permissions yang dimiliki role
        $permissions = $roleById->permissions->pluck('id')->toArray();

        // Mengambil deskripsi permission untuk ditampilkan
        $permissionsWithDescription = Permission::whereIn('id', $allPermissions->pluck('id'))->get(['id', 'deskripsi']);

        return view('role.permission', compact('allPermissions', 'roleById', 'permissions', 'permissionsWithDescription'));
    }

    /**
     * Menyimpan perubahan permission untuk role.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function doRolePermissions(Request $request)
    {
        $role = Role::findOrFail($request->role);

        // Jika tidak ada permission yang dikirim, gunakan array kosong agar semua permission dihapus
        $permissions = array_keys($request->permission ?? []);

        // Sinkronisasi permissions dengan role
        $role->syncPermissions($permissions);

        return redirect()->route('role.index')->with('success', 'Role berhasil diperbarui.');
    }
}
