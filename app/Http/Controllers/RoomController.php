<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use App\Models\User;
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
        try {
            $room->delete();
        }catch (\Exception $exception){
            return redirect('/rooms')->with('failed', 'Room is related to many reservations, cant be deleted for the moment');
        }
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
        return view('pages.room_edit', compact('room'));
    }

    public function show(Room $room)
    {
        return view('pages.room', compact('room'));
    }


}
