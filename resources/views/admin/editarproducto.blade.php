<?php 
/** @var \Illuminate\Support\ViewErrorBag $errors */
/** @var \App\Models\Producto $producto */
?>

@extends('layouts.admin')

@section('title', 'Editar Producto')

@section('content')
	<section class="container">
		<h2>Editar {{ $producto->nombre }}</h2>

        <form action="{{ route('admin.editarproducto', ['id' => $producto->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="nombre" 
                    name="nombre" 
                    placeholder="Nombre del producto" 
                    @error('nombre') aria-describedby="error-nombre" @enderror
                    value="{{ old('nombre', $producto->nombre) }}"
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
                    value="{{ old('marca', $producto->marca) }}"
                >
                @error('marca')
                    <div id="error-marca" class="text-danger">Error: {{ $message }}</div>                   
                @enderror
            </div>
            <div class="form-group">
                <label for="deporte">Deporte</label>
                <span class="small">(Mínimo 3 carácteres)</span>
                <input 
                    type="text" 
                    class="form-control" 
                    id="deporte"
                    name="deporte" 
                    placeholder="Deporte"
                    @error('deporte') aria-describedby="error-deporte" @enderror
                    value="{{ old('deporte', $producto->deporte) }}"
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
                    value="{{ old('precio', $producto->precio) }}"
                >
                @error('precio')
                    <div id="error-precio" class="text-danger">Error: {{ $message }}</div>                   
                @enderror
            </div>
            <div class="form-group">
                <p>Imagen actual:</p>
                @if ($producto->imagen != null)
                    <img src="{{ url('img/' . $producto->imagen) }}" alt="Imágen Actual">
                @else
                    <p>El producto no tiene ninguna imágen adjunta</p>
                @endif
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
            <button type="submit" class="btn btn-primary">Editar</button>            

        </form>
	</section>
    
@endsection