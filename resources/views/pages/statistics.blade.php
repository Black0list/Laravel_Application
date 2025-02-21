@extends('layouts.dashboard')


@section('content')
<div class="card-body d-flex">
    <div class="col-md-3 col-sm-6">
        <div class="card shadow-sm h-100">
            <div class="card-body">
                <h5 class="card-title"><i class="bi bi-clipboard-data me-2"></i>Rooms</h5>
                <h2 class="card-text text-primary">{{ $rooms }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6">
        <div class="card shadow-sm h-100">
            <div class="card-body">
                <h5 class="card-title"><i class="bi bi-pie-chart me-2"></i>Reservations</h5>
                <h2 class="card-text text-success">{{ $reservations }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6">
        <div class="card shadow-sm h-100">
            <div class="card-body">
                <h5 class="card-title"><i class="bi bi-person-circle me-2"></i>Users</h5>
                <h2 class="card-text text-warning">{{ $users }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6">
        <div class="card shadow-sm h-100">
            <div class="card-body">
                <h5 class="card-title"><i class="bi bi-bar-chart-line me-2"></i>Roles</h5>
                <h2 class="card-text text-danger">{{ $roles }}</h2>
            </div>
        </div>
    </div>
</div>
@endsection
