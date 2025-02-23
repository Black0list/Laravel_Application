<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('pages.reservations', compact('reservations'));
    }

    public function book(Request $request)
    {
        $reservation = new Reservation();

        $reservation->user_id = $request['user'];
        $reservation->room_id = $request['room'];
        $reservation->start_date = $request['start_date'];
        $reservation->end_date = $request['end_date'];

        $checkValidity = false;

        if(Reservation::where('room_id', $reservation->room_id)
            ->where('start_date', '<=', $reservation->end_date)
            ->where('end_date', '>=', $reservation->start_date)
            ->where('status', '=', 'confirmed')
            ->exists())
        {
            $checkValidity = true;
        }

        if(!$checkValidity)
        {
            $reservation->save();
        } else {
            return redirect('/admin/reservations')->with('failed', 'Room cant be booked, is Already Booked');
        }

        return redirect('/admin/reservations')->with('success', 'Room booked successfully!');
    }

    public function setStatus(Request $request, Reservation $reservation)
    {

        $checkValidity = false;

        if(Reservation::where('room_id', $reservation->room_id)
            ->where('start_date', '<=', $reservation->end_date)
            ->where('end_date', '>=', $reservation->start_date)
            ->where('status', '=', 'confirmed')
            ->exists() && $request['status'] === 'confirmed')
        {
            $checkValidity = true;
        }

        if(!$checkValidity)
        {
            $reservation->status = $request['status'];
            $reservation->save();
            return redirect('/admin/reservations')->with('success', 'Room status updated successfully!');
        }

        return redirect('/admin/reservations')->with('failed', 'There is already a Room with that Time Confirmed!');
    }
}
