@extends('layouts.main')

@section('title', 'Articulo ' . $articulo->titulo)

@section('content')

<section class="container">
    <div class="row">
        <h2>{{$articulo->titulo}}</h2>
        @if($articulo->imagen !== null)
        <img class="img-fluid my-3" src="{{ url('img/' . $articulo->imagen) }}" alt="{{ $articulo->titulo}}">
        @endif
        {!!$articulo->articulo!!}
    </div>
    <div class="text-center">
        <a class="btn btn-primary m-1" href="{{ route('blog')}}" aria-label="Volver atrás">Volver</a>
    </div>
</section>

@endsection