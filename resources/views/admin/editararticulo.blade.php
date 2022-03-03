<?php 
/** @var \Illuminate\Support\ViewErrorBag $errors */
/** @var \App\Models\Articulo $articulo */
/** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Tematica[] $tematicas */
/** @var \Illuminate\Support\Collection|array $tematicasSeleccionadas */
?>

@extends('layouts.admin')

@section('title', 'Editar Artículo')

@section('content')
	<section class="container">
		<h2>Editar {{ $articulo->titulo }}</h2>

        <form action="{{ route('admin.editararticulo', ['id' => $articulo->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="titulo">Titulo</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="titulo" 
                    name="titulo" 
                    placeholder="titulo del articulo" 
                    @error('titulo') aria-describedby="error-titulo" @enderror
                    value="{{ old('titulo', $articulo->titulo) }}"
                >
                @error('titulo')
                    <div id="error-titulo" class="text-danger">Error: {{ $message }}</div>                   
                @enderror
            </div>
            <div class="form-group">
                <label for="preview">Preview</label>
                <textarea
                    class="form-control" 
                    id="preview" 
                    name="preview" 
                >{{ old('preview', $articulo->preview) }}</textarea>
                @error('preview')
                    <div id="error-preview" class="text-danger">Error: {{ $message }}</div>                   
                @enderror
            </div>
            <div class="form-group">
                <label for="articulo">Artículo</label>
                <textarea
                    class="form-control" 
                    id="articulo"
                    name="articulo" 
                >{{ old('articulo', $articulo->articulo) }}</textarea>
                @error('articulo')
                    <div id="error-articulo" class="text-danger">Error: {{ $message }}</div>                   
                @enderror
            </div>
            <div class="form-group">
                <p>Imagen actual:</p>
                @if ($articulo->imagen != null)
                    <img src="{{ url('img/' . $articulo->imagen) }}" alt="Imágen Actual">
                @else
                    <p>El articulo no tiene ninguna imágen adjunta</p>
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
            <fieldset class="form-group">
                <legend>Tematicas</legend>
                @foreach($tematicas as $tematica)
                    <label class="form-check-label">
                        <input 
                            type="checkbox" 
                            name="tematica_id[]" 
                            value="{{ $tematica->tematica_id }}"
                            @if($tematicasSeleccionadas->contains($tematica->tematica_id)) checked
                            @endif
                            >
                        {{ $tematica->categoria }}
                    </label>
                @endforeach
            </fieldset>
            <button type="submit" class="btn btn-primary">Editar</button>            

        </form>
	</section>
    
@endsection