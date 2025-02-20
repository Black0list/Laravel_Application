@extends('layouts.dashboard')

@section('content')
<div>
    <!-- Button trigger modal -->
    <div>
        <button type="button" class="btn btn-primary mt-2 mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
            add New Role
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
                            <input type="text" class="form-control" name="name" value="{{ old('email') }}" id="name" required>
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
        <table class="table table-hover table-bordered text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Role Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Users</th>
                    <th scope="col" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="table-light">
                @foreach($roles as $role)
                <tr>
                    <td><strong>{{ $role->role_name }}</strong></td>
                    <td>{{ $role->role_description }}</td>
                    <td>
                        @if($role->users->isNotEmpty())
                        <span class="badge bg-success">{{ $role->users->count() }} Users</span>
                        <ul class="list-unstyled m-0 p-0">
                            @foreach($role->users as $user)
                            <li>{{ $user->name }}</li>
                            @endforeach
                        </ul>
                        @else
                        <span class="badge bg-secondary">No Users</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ url('/roles/' . $role->id) }}" class="btn btn-sm btn-info">
                            <i class="bi bi-eye"></i> View
                        </a>

                        <form action="{{ url('/roles/update/' . $role->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil"></i> Edit
                            </button>
                        </form>

                        <form action="{{ url('/roles/delete/' . $role->id) }}" method="POST" style="display:inline;">
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