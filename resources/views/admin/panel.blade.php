
@extends('layouts.admin')

@section('title', 'Panel de administración')

@section('content')
	<section class="container">
		<h2>Bienvenido al panel de administración</h2>
		<p>Desde este lugar podrás ver, editar y crear la información de los productos, los artículos y los usuarios</p>
	
	<div class="row">
		<div class="card col-md-4">
			<div class="card-body">
				<h3 class="card-title">Panel de productos</h3>
				<p class="card-text">Consultá los detalles de todos los productos. Editá o publicá nuevos productos.</p>
				<a href="<?= route('admin.productos');?>" class="btn btn-primary">Ir a productos</a>
			</div>
		</div>

		<div class="card col-md-4">
			<div class="card-body">
				<h3 class="card-title">Panel de artículos</h3>
				<p class="card-text">Consultá los artículos subidos al blog. Editá o publicá nuevos artículos en el blog.</p>
				<a href="<?= route('admin.articulos');?>" class="btn btn-primary">Ir a articulos</a>
			</div>
		</div>

		<div class="card col-md-4">
			<div class="card-body">
				<h3 class="card-title">Panel de usuarios</h3>
				<p class="card-text">Consultá el indice de usuarios registrados y chequeá que rol tienen asignado.</p>
				<a href="<?= route('admin.usuarios');?>" class="btn btn-primary">Ir a usuarios</a>
			</div>
		</div>
	</div>

	</section>
	<section class="container mt-5">
		<?php
		$total = 0;
		foreach($pagos as $pago) {
			$total = $total + $pago['precio']*$pago['unidades'];
		};
		?>
		<h2>Estadísticas</h2>
		<ul class="list-group">
			<li class="list-group-item">Total de ventas histórico: $ <span class="font-weight-bold">{{ $total }}</span></li>
			<li class="list-group-item">Cantidad total de productos vendidos: <span class="font-weight-bold">{{ $cantidadunidades }}</span></li>
			<li class="list-group-item">Productos mas popular: <span class="font-weight-bold">{{ $popular[0] }}</span></li>
		</ul>
	</section>
    
@endsection
