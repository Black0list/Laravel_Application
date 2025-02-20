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
                    <h5><i class="bi bi-currency-dollar"></i>Price</h5>
                    <p class="text-muted">${{ $room->price }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection