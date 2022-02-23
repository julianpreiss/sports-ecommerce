<?php 
/** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Articulo[] $articulo */
?>

@extends('layouts.admin')

@section('title', 'Articulo' . $articulo->nombre)

@section('content')

<section class="text-center offset-md-1 col-md-10 container mt-3">
    <h2 class="col-12 text-center">{{$articulo->titulo}}</h2>

    @if($articulo->imagen !== null)
    <img class="text-center img-fluid" src="{{ url('img/' . $articulo->imagen) }}" alt="{{ $articulo->titulo}}">
    @endif
									
    <section>
        {!!$articulo->articulo!!}
    </section>

    <a class="btn btn-primary m-1" href="{{ route('admin.articulos')}}" aria-label="Volver atrás">Volver</a>
</section>

@endsection
