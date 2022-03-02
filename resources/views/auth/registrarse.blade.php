<?php 
/** @var \Illuminate\Support\ViewErrorBag $errors */
?>

@extends('layouts.main')

@section('title', 'Registrarse')

@section('content')
	<section class="container">
		<h2>Registrarse</h2>

        <form action="{{ route('auth.registrarse') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input 
                    type="email" 
                    class="form-control" 
                    id="email" 
                    name="email" 
                    @error('email') aria-describedby="error-email" @enderror
                    value="{{ old('email') }}"
                >
                @error('email')
                    <div id="error-email" class="text-danger">Error: {{ $message }}</div>                   
                @enderror
            </div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="nombre" 
                    name="nombre" 
                    @error('nombre') aria-describedby="error-nombre" @enderror
                    value="{{ old('nombre') }}"
                >
                @error('nombre')
                    <div id="error-nombre" class="text-danger">Error: {{ $message }}</div>                   
                @enderror
            </div>
            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="apellido" 
                    name="apellido" 
                    @error('apellido') aria-describedby="error-apellido" @enderror
                    value="{{ old('apellido') }}"
                >
                @error('apellido')
                    <div id="error-apellido" class="text-danger">Error: {{ $message }}</div>                   
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input 
                    type="password" 
                    class="form-control" 
                    id="password" 
                    name="password" 
                    @error('password') aria-describedby="error-password" @enderror
                    value="{{ old('password') }}"
                >
                @error('password')
                    <div id="error-password" class="text-danger">Error: {{ $message }}</div>                   
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Registrarse</button>            

        </form>
	</section>
    
@endsection