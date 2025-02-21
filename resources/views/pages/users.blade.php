@extends('layouts.dashboard')

@section('content')
<div>
    <!-- Button trigger modal -->
    <div>
        <button type="button" class="btn btn-primary mt-2 mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
            add New User
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-light text-dark dark-mode">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="registerForm" method="POST" action="/admin/user/create" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('email') }}" id="name" required pattern="^[A-Za-z]+$">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="email" required>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" value="{{ old('password') }}" id="password" required minlength="6">
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="flex-wrap justify-content-xl-center m-10 d-flex" style="width: 100%; gap: 20px">
        <table class="table table-hover table-bordered text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="table-light">
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <span class="badge bg-primary">{{ $user->role->role_name }}</span>
                    </td>
                    <td>
                        <a href="{{ url('/admin/user/get/' . $user->id) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i> Update
                        </a>
                        <form action="{{ url('/admin/user/delete', $user->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection
