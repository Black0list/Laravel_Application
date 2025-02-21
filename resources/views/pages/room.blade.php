@extends('layouts.dashboard')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Room Details</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <h5><i class="bi bi-house-door"></i> Name</h5>
                    <p class="text-muted">{{ $room->name }}</p>
                </div>
                <div class="col-md-4">
                    <h5><i class="bi bi-people"></i> Capacity</h5>
                    <p class="text-muted">{{ $room->people }} People</p>
                </div>
                <div class="col-md-4">
                    <h5><i class="bi bi-currency-dollar"></i> Price</h5>
                    <p class="text-muted">${{ $room->price }}</p>
                </div>
            </div>

            <form action="{{ url('/room/book') }}" method="POST" style="display:inline;">
                @csrf
                <input type="hidden" class="form-control" id="user" name="user" value="{{ Auth::user()->id }}">
                <input type="hidden" class="form-control" id="room" name="room" value="{{ $room->id }}">
                <label for="start_date">Start Date</label>
                <input type="datetime-local" class="form-control" id="start_date" name="start_date" value="{{ date('Y-m-d\TH:i') }}">
                <label for="end_date">End Date</label>
                <input type="datetime-local" class="form-control" id="end_date" name="end_date" value="{{ date('Y-m-d\TH:i') }}">
                <br>
                <button type="submit" class="btn btn-sm btn-primary">
                    <i class="bi bi-book"></i> Book
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
