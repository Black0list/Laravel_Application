<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Termwind\Components\Raw;

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

    public function delete(Room $room)
    {
        $room->delete();
        return redirect('/rooms');
    }

    public function update(Request $request, $id)
    {
        $room = Room::findOrFail($id);

        $room->update([
            'name' => $request['name'],
            'people' => $request['capacity'],
            'price' => $request['price']
        ]);

        return redirect('/rooms')->with('success', 'Room updated successfully!');
    }

    public function getRoom(Room $room)
    {
        return view('pages.roomEdit', compact('room'));
    }

    public function show(Room $room)
    {
        return view('pages.room', compact('room'));
    }
}
