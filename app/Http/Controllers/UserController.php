<?php

namespace App\Http\Controllers;

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
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'role_id' => 1,
        ]);

        Auth::login($user);
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
        return view('pages.user_edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $room = User::findOrFail($id);

        $room->update([
            'name' => $request['name'],
        ]);

        return redirect('/admin/users')->with('success', 'User Name updated successfully!');
    }
}
