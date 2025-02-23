<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('pages.users', compact('users'));
    }

    public function create(Request $request)
    {

        $roleId = Role::whereRaw('LOWER(role_name) = ?', 'client')->first()->id;

        if (!$roleId) {
            $role = Role::create(['role_name' => 'client', 'role_description' => ' ']);
            $roleId = $role->id;
        }

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'role_id' => $roleId,
        ]);

//        Auth::login($user);
        return redirect('/admin/users');
    }

    public function delete(User $user)
    {
        try {
            $user->delete();
        }catch (\Exception $exception){
            return redirect('/admin/users')->with('failed', 'User is related to many reservations, cant be deleted for the moment');
        }
    }

    public function getUser(User $user)
    {
        $roles = Role::all();
        return view('pages.user_edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $room = User::findOrFail($id);

        $room->update([
            'name' => $request['name'],
            'role_id' => $request['role'],
        ]);

        return redirect('/admin/users')->with('success', 'User updated successfully!');
    }
}
