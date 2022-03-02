@extends('layouts.main')

@section('title', 'Mi Perfil')

@section('content')

<section class="text-center offset-md-1 col-md-10 container mt-3">
    <div class="row">
        <div class="col-12 col-md-6 ">    
            <h2 class="col-12 text-center">Mi Perfil</h2>
            <?php
            // print_r($usuario);
            ?>
            <ul>
                <li class="list-group-item">Email de usuario: {{ $usuario['email'] }}</li>
                <li class="list-group-item">Nombre: {{ $usuario['nombre'] }}</li>
                <li class="list-group-item">Apellido: {{ $usuario['apellido'] }}</li>
            </ul>
        </div>
        <div class="col-12 col-md-6 ">
            <h4>Mis compras</h4>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Unidades</th>
                    </tr>
                </thead>
                <tbody><?php 
                    $total = 0;
                    foreach($productoscomprados as $producto) {
                    $total = $total + $producto['precio']*$producto['unidades']
                    ?>
                    <tr>
                        <td>{{ $producto['nombre'] }}</td>
                        <td>{{ $producto['precio'] }}</td>
                        <td>{{ $producto['unidades'] }}</td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection