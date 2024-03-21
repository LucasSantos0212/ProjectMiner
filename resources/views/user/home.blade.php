@extends('layouts.main')

@section('title','Home')

@section('content')

    @if($user->name != "admin")
        <div class="container">
            @if($user->permission_product == 1)
                <a class="btn btn-primary btn-home btn-block" href="{{route('user.product')}}">Produtos</a>
            @endif
            @if($user->permission_category == 1)
                <a class="btn btn-primary btn-home btn-block" href="{{route('user.category')}}">Categorias</a>
            @endif
            @if($user->permission_brand == 1)
                <a class="btn btn-primary btn-home btn-block" href="{{route('user.brand')}}">Marcas</a>
            @endif
            @if($user->permission_product == 0 && $user->permission_category == 0 && $user->permission_brand == 0)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        "Nenhuma permissão atribuida ao usuario"
                    </div>
            @endif
        </div>
    @endif
@endsection