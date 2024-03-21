@extends('layouts.main')

@section('title','Error')

@section('content')
    @if($errorMessage)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $errorMessage }}
        </div>
    @endif
@endsection