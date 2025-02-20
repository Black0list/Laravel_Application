@extends('layouts.dashboard')

@section('content')
    <div>
        <!-- Button trigger modal -->
        <div>
            <button type="button" class="btn btn-primary mt-2 mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                add New Room
            </button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="registerForm" method="POST" action="/rooms/create" novalidate>
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('email') }}" id="name" required >
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="capacity" class="form-label">Capacity</label>
                                <input type="number" class="form-control" name="capacity" value="{{ old('capacity') }}" id="capacity" required>
                                @if ($errors->has('capacity'))
                                    <span class="text-danger">{{ $errors->first('capacity') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" class="form-control" name="price" value="{{ old('price') }}" id="price" required minlength="6">
                                @if ($errors->has('price'))
                                    <span class="text-danger">{{ $errors->first('price') }}</span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary w-100">create</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex-wrap justify-content-xl-center m-10 d-flex" style="width: 100%; gap: 20px">
            <table class="table table-hover table-bordered text-center">
                <thead class="thead-light">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->role_name }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
