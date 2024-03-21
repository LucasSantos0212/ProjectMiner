@extends('layouts.main')

@section('title','Admin')

@section('content')
    
    <div class="container-admin">

        @auth 
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <div class="nav-item">
                    <a class="btn btn-danger btn-logout nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                this.closest('form').submit(); " role="button">
                        <i class="fas fa-sign-out-alt"></i>

                        {{ __('Log Out') }}
                    </a>
                </div>
            </form>
        @endauth

        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">id</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Permissoes</th>
                </tr>
            </thead>
            
            <tbody>
        
            @foreach($users as $user)
                @if($user->name != "admin")

                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td><a class="btn btn-warning" href="{{ route('user.permission', ['user' => $user->id]) }}" role="button">Editar</a></td>
                    </tr>

                @endif
            @endforeach

            </tbody>
        </table>
    </div>
@endsection