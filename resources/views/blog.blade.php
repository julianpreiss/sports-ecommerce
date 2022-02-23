<?php 
/** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Articulo[] $articulos */
?>

@extends('layouts.main')

@section('title', 'Listado de articulos')

@section('content')

<section class="text-center offset-md-1 col-md-10 container mt-3">
    <h2 class="col-12 text-center">Blog</h2>
	<div class="row">

        <?php 
        foreach($articulos as $articulo): 
        ?>

			<article class="col-md-4 py-3 border rounded d-sm-block justify-content-center">
				<h3>{{$articulo->titulo}}</h3>
                <p class="small">Publicado: {{$articulo->created_at}}</p>
                <p>{{$articulo->preview}}</p>
                <a href="{{ route('detallesarticulo', ['id' => $articulo->id]) }}">Leer completo</a>

			</article>

            <?php
            endforeach;
            ?>
	</div>
</section>

@endsection
