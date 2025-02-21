@extends('layouts.dashboard')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Edit User</h4>
            </div>
            <div class="card-body">
                <form action="{{ url('/admin/user/update/' . $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label"><i class="bi bi-house-door"></i> Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                    </div>

                    <div class="text-end">
                        <a href="{{ url('/users') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
