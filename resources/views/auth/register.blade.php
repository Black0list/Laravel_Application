@extends('layouts.form')

@section('content')
<div class="card p-4 shadow-lg" style="width: 400px;">
    <h3 class="text-center">Register</h3>
    <form id="registerForm" method="POST" action="/users/create" novalidate>
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
    <div class="text-center mt-3">
        <a href="/login">Already have an account? Login</a>
    </div>
</div>
@endsection
