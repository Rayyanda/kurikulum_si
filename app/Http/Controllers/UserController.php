<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return view('user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->password == $request->re_password) {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password); // Encrypt the password
            $user->save();

            session()->flash('success', 'Data Berhasil ditambahkan');
            return back();
        } else {
            session()->flash('error', 'Password tidak sama');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        session()->flash('success', 'Data Berhasil diubah');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return response()->json(['success' => 'User deleted successfully.']);
        } else {
            return response()->json(['error' => 'User not found.'], 404);
        }
    }

    public function userRoles($id)
    {
        $user = User::where('id', $id)->with('roles')->first();
        $roles = Role::all();

        $userRoles = $user->roles->pluck('id')->toArray();

        $html = '<div class="row">';
        foreach ($roles as $role) {
            $checked = in_array($role->id, $userRoles) ? 'checked' : '';
            $html .= '<div class="col-md-5">
                <input type="checkbox" name="roles[' . $role->name . ']" value="' . $role->name . '" ' . $checked . '> ' . $role->name . '
            </div>';
        }
        $html .= '</div>';
        return response()->json(['html' => $html]);
    }

    public function doAssignUserRoles(Request $request)
    {
        if (isset($request->roles)) {
            $user = User::where('id', $request->userId)->first();
            $roles = array_keys($request->roles);
            $user->syncRoles($roles);
        }

        session()->flash('success', 'Berhasil melakukan assign role');
        return back();
    }
}
