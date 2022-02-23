@extends('layouts.main')

@section('title', 'Mi Carrito')

@section('content')

<section class="text-center offset-md-1 col-md-10 container mt-3">
    <h2 class="col-12 text-center">Pago exitoso</h2>
	<div class="row">

        <section class="container text-center">
            <h3>Detalles de tu compra</h3>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody><?php 
                    $total = 0;
                    foreach($productos as $producto) {
                    $total = $total + $producto['precio']*$producto['unidades']
                    ?>
                    <tr>
                        <td>{{ $producto['nombre'] }}</td>
                        <td>{{ $producto['precio'] }}</td>
                        <td>{{ $producto['unidades'] }}</td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td class="font-weight-bold" colspan="2">Total</td>
                        
                        <td class="font-weight-bold">{{ $total }}</td>
                    </tr>
                </tbody>
            </table>
        </section>
</section>

@endsection