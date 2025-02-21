<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Room;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();

        return view('pages.roles', compact('roles'));
    }

    public function create(Request $request)
    {
        Role::create([
            'role_name' => $request['role_name'],
            'role_description' => $request['role_description'],
        ]);
        return redirect('/admin/users');
    }

    public function getRole(Role $role)
    {
        return view('pages.role_edit', compact('role'));
    }

    public function delete(Role $role)
    {
        try {
            $role->delete();
        }catch (\Exception $exception){
            return redirect('/admin/roles')->with('failed', 'Role is related to many Users, cant be deleted for the moment');
        }
        return redirect('/admin/roles');
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $role->update([
            'role_name' => $request['role_name'],
            'role_description' => $request['role_description'],
        ]);

        return redirect('/admin/roles')->with('success', 'Role updated successfully!');
    }
}
