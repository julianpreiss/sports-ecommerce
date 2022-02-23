<?php 
/** @var \Illuminate\Support\ViewErrorBag $errors */
?>

@extends('layouts.admin')

@section('title', 'Agregar producto')

@section('content')
	<section class="container">
		<h2>Agregar nuevo producto</h2>

        <form action="{{ route('admin.agregarproducto') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <span class="small">(Mínimo 3 carácteres)</span>
                <input 
                    type="text" 
                    class="form-control" 
                    id="nombre" 
                    name="nombre" 
                    placeholder="Nombre del producto" 
                    @error('nombre') aria-describedby="error-nombre" @enderror
                    value="{{ old('nombre') }}"
                >
                @error('nombre')
                    <div id="error-nombre" class="text-danger">Error: {{ $message }}</div>                   
                @enderror
            </div>
            <div class="form-group">
                <label for="marca">Marca</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="marca" 
                    name="marca" 
                    placeholder="Marca del producto"
                    @error('marca') aria-describedby="error-marca" @enderror
                    value="{{ old('marca') }}"
                >
                @error('marca')
                    <div id="error-marca" class="text-danger">Error: {{ $message }}</div>                   
                @enderror
            </div>
            <div class="form-group">
                <label for="deporte">Deporte</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="deporte"
                    name="deporte" 
                    placeholder="Deporte"
                    @error('deporte') aria-describedby="error-deporte" @enderror
                    value="{{ old('deporte') }}"
                >
                @error('deporte')
                    <div id="error-deporte" class="text-danger">Error: {{ $message }}</div>                   
                @enderror
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input 
                    type="text" 
                    inputmode="numeric" 
                    class="form-control" 
                    id="precio" 
                    name="precio" 
                    placeholder="Precio del producto"
                    @error('precio') aria-describedby="error-precio" @enderror
                    value="{{ old('precio') }}"
                >
                @error('precio')
                    <div id="error-precio" class="text-danger">Error: {{ $message }}</div>                   
                @enderror
            </div>
            <div class="form-group">
                <label for="imagen">Imagen</label>
                <input 
                    type="file" 
                    class="form-control" 
                    id="imagen" 
                    name="imagen" 
                >
            </div>
            <div class="form-group">
                <label for="descripcionimg">Descripción de la imagen</label>
                <input 
                    type="text"  
                    class="form-control" 
                    id="descripcionimg" 
                    name="descripcionimg"
                    placeholder="Descripción de la imágen"
                >
            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>            

        </form>
	</section>
    
@endsection