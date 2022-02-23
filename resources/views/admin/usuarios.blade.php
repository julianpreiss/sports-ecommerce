<?php 
/** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Usuario[] $usuarios */
?>

@extends('layouts.admin')

@section('title', 'Listado de Usuarios')

@section('content')
	<main class="container">
		<h2>Listado de usuarios</h2>



	<table class="table table-striped table-bordered table-responsive-md">
		<thead>
		<tr>
			<th>Id</th>
			<th>Email</th>
			<th>Rol/Tipo de usuario</th>
		</tr>
		</thead>
		<tbody>
			@foreach($usuarios as $usuario)
			<tr>
				<td>{{ $usuario->id }}</td>
				<td>{{ $usuario->email }}</td>
				<td>{{ $usuario->rol->tipo }}</td>
			</tr>
	@endforeach
		</tbody>
	</table>
	</main>
    
@endsection