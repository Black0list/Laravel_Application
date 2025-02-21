@extends('layouts.dashboard')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Edit Role</h4>
            </div>
            <div class="card-body">
                <form action="{{ url('/admin/role/update/' . $role->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="role_name" class="form-label"><i class="bi bi-house-door"></i>Role Name</label>
                        <input type="text" class="form-control" id="role_name" name="role_name" value="{{ $role->role_name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="role_description" class="form-label"><i class="bi bi-house-door"></i>Role Description</label>
                        <input type="text" class="form-control" id="role_description" name="role_description" value="{{ $role->role_description }}" required>
                    </div>

                    <div class="text-end">
                        <a href="{{ url('/admin/roles') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
