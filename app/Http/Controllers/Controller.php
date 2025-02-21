<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Role;
use App\Models\Room;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function stats()
    {
        $users = User::get()->count();
        $roles = Role::get()->count();
        $rooms = Room::get()->count();
        $reservations = Reservation::get()->count();

        return view('pages.statistics', compact('users', 'roles', 'rooms', 'reservations'));
    }
}
