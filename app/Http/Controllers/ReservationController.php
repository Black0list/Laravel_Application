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

//        dd($reservation->start_date . " " . $reservation->end_date);
        dd("daw");

        if(Reservation::whereBetween('start_date', [$reservation->start_date, $reservation->end_date])->orWhereBetween('end_date', [$reservation->start_date, $reservation->end_date])->exists())
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
}
