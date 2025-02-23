<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $roleId = Role::whereRaw('LOWER(role_name) = ?', 'client')->first()->id;

        if (!$roleId) {
            $role = Role::create(['role_name' => 'client', 'role_description' => ' ']);
            $roleId = $role->id;
        }


        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role_id' => $roleId
        ]);

        return redirect('/login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();
        if(!$user)
        {
            return back()->with('failed', 'Email or password is incorrect');
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->with('failed', 'Email or password is incorrect');
        }

        Auth::login($user);

        return redirect('/rooms');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
