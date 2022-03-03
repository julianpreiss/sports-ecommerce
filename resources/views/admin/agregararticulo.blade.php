<?php 
/** @var \Illuminate\Support\ViewErrorBag $errors */
/** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Tematica[] $tematicas */
/** @var \Illuminate\Support\Collection|array $tematicasSeleccionadas */
?>

@extends('layouts.admin')

@section('title', 'Agregar artíulo')

@section('content')
	<section class="container">
		<h2>Agregar nuevo artículo</h2>

        <form action="{{ route('admin.agregararticulo') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="titulo">Título</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="titulo" 
                    name="titulo" 
                    placeholder="Titulo del articulo" 
                    @error('titulo') aria-describedby="error-titulo" @enderror
                    value="{{ old('titulo') }}"
                >
                @error('titulo')
                    <div id="error-titulo" class="text-danger">Error: {{ $message }}</div>                   
                @enderror
            </div>
            <div class="form-group">
                <label for="preview">Preview - Resumen</label>
                <textarea 
                    class="form-control" 
                    id="preview" 
                    name="preview" 
                    @error('preview') aria-describedby="error-preview" @enderror
                >{{ old('preview') }}</textarea>
                @error('preview')
                    <div id="error-preview" class="text-danger">Error: {{ $message }}</div>                   
                @enderror
            </div>
            <div class="form-group">
                <label for="articulo">Artículo</label>
                <textarea
                    rows="20"
                    class="form-control" 
                    id="articulo"
                    name="articulo"
                    @error('articulo') aria-describedby="error-articulo" @enderror
                >{{ old('articulo') }}</textarea>
                @error('articulo')
                    <div id="error-articulo" class="text-danger">Error: {{ $message }}</div>                   
                @enderror
            </div>
            <div class="form-group">
                <label for="imagen">Imagen</label>
                <input 
                    type="file" 
                    class="form-control" 
                    id="imagen" 
                    name="imagen" 
                    placeholder="Adjuntar una imágen del articulo"
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
            <button type="submit" class="btn btn-primary">Agregar</button>            

        </form>
	</section>
    
@endsection