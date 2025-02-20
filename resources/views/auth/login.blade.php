@extends('layouts.form')

@section('content')
    <div class="card p-4 shadow-lg" style="width: 400px;">
        @if(session('failed'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Oups!</strong> ' . {{ session('failed') }} . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form method="POST" action="/login">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" aria-describedby="passwordHelp">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div class="text-center mt-3">
            <a href="/register">You dont have an account yet? Register</a>
        </div>
    </div>
@endsection
