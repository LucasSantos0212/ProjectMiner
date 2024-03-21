@extends('layouts.main')

@section('title','Index')

@section('content')

<div class="container">

    <h1 class="index-title">Pagina principal:</h1>

    @auth
    
        <a class="btn btn-primary btn-home btn-block" href="{{route('user.home')}}" role="button">Home</a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <div class="nav-item">
                <a class="btn btn-danger btn-logout-index nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                            this.closest('form').submit(); " role="button">
                    <i class="fas fa-sign-out-alt"></i>

                    {{ __('Log Out') }}
                </a>
            </div>
        </form>
    @endauth
    @guest
        <a class="btn btn-primary btn-home btn-block" href="{{route('login')}}" role="button">Login</a>
        <a class="btn btn-primary btn-home btn-block" href="{{route('register')}}" role="button">Register</a>
    @endguest
    
</div>

@endsection