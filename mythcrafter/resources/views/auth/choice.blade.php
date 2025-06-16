@extends('layouts.app')

@section('title', 'Login or Register')

@section('content')
<div class="container mt-4">
    <div class="text-center shadow p-4 rounded bg-white" style="margin: 0 auto;">
        <h1>Welcome to Character Creator!</h1>
        <p>Please choose an action:</p>

        <a href="{{ route('login.form') }}" class="btn btn-outline-dark">Login</a>
        <a href="{{ route('register.form') }}" class="btn btn-outline-dark">Register</a>
    </div>
</div>
@endsection
