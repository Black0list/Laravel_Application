<?php

namespace App\Http\Controllers;

use App\Models\Role;
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
            'role_name' => "admin",
            'role_description' => "decription admin",
        ]);
        return redirect('/users');
    }
}
