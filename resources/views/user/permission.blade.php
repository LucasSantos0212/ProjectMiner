@extends('layouts.main')

@section('title','Permissão do Usuario ' . $user_edit->name)

@section('content')

<div class="container">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <h2 class="index-title">Editar permissão:</h2>
    
    <form action="{{route('user.update.permission', ['user' => $user_edit->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-check">
        <input class="form-check-input" type="checkbox" value="1" id="CheckProduct" name="permission_product" @if($user_edit->permission_product == 1) checked @endif>
            <label class="form-check-label" for="defaultCheck1">
                Produtos
            </label>
        </div>

        <div class="form-check">
        <input class="form-check-input" type="checkbox" value="1" id="CheckCategory" name="permission_category" @if($user_edit->permission_category == 1) checked @endif>
            <label class="form-check-label" for="defaultCheck1">
                Categorias
            </label>
        </div>

        <div class="form-check">
        <input class="form-check-input" type="checkbox" value="1" id="CheckBrand" name="permission_brand" @if($user_edit->permission_brand == 1) checked @endif>
            <label class="form-check-label" for="defaultCheck1">
                Marcas
            </label>
        </div>
        <br>

        <button type="submit" class="btn btn-primary btn-block">Salvar</button>

    </form>
    <br>
        <a class="btn btn-primary btn-block" href="{{route('user.home')}}" role="button">Voltar</a>
</div>

@endsection