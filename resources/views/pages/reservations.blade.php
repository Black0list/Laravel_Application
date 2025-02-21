@extends('layouts.dashboard')

@section('content')
    <div>
        <div class="flex-wrap justify-content-xl-center m-10 d-flex" style="width: 100%; gap: 20px">
            <table class="table table-hover table-bordered text-center align-middle">
                <thead class="table-dark">
                <tr>
                    <th scope="col">User</th>
                    <th scope="col">Room</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                </tr>
                </thead>
                <tbody class="table-light">
                @foreach($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->user->name }}</td>
                        <td>{{ $reservation->room->name }}</td>
                        <td>
                            <span class="badge bg-primary">{{ $reservation->start_date }}</span>
                        </td>
                        <td>
                            <span class="badge bg-primary">{{ $reservation->end_date }}</span>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
