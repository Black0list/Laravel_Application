@extends('layouts.dashboard')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Edit Room</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('/admin/room/update/' . $room->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label"><i class="bi bi-house-door"></i> Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $room->name }}" required>
                </div>

                <div class="mb-3">
                    <label for="capacity" class="form-label"><i class="bi bi-people"></i> Capacity</label>
                    <input type="number" class="form-control" id="capacity" name="capacity" value="{{ $room->people }}" required>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label"><i class="bi bi-currency-dollar"></i> Price</label>
                    <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ $room->price }}" required>
                </div>

                <div class="text-end">
                    <a href="{{ url('/rooms') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
