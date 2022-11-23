@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
            <h1>Welcome Sir!</h1>
            <p class="lead">Your viewing the home page. Click On the above button to go to <strong>Tax Calculator</strong>.
                <a href="{{ route('cars.index') }}" class="btn btn-success">Tax Dashboard</a>
            </p>
        @endauth

        @guest
        <h1>Welcome Sir!</h1>
                <p class="lead">Your viewing the home page. Please login to view <strong>Tax Calculator</strong>.
            <a href="{{ route('login.perform') }}" class="btn btn-outline-warning ">Login</a>
        </p>
        @endguest
    </div>
@endsection
