<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('pages.rooms', compact('rooms'));
    }

    public function create(Request $request)
    {
        Room::create([
            'name' => $request['name'],
            'people' => $request['capacity'],
            'price' => $request['price'],
        ]);

        return redirect('/rooms');
    }

    public function delete(Request $request)
    {
        echo "dawd";
        dd($request['id']);
        $room = Room::find($request['id']);
    }
}
