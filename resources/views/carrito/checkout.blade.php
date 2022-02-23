<?php
/** @var \MercadoPago\Preference $preference */
?>

@extends('layouts.main')

@section('title', 'Checkout')

@push('js')
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>
        const mp = new MercadoPago('<?= config('mercadopago.public_key');?>', {locale: 'es-AR'});

        mp.checkout({
            preference: {
                id: '<?= $preference->id;?>'
            },
            render: {
                label: 'Finalizar compra',
                container: '#mercadopago-btn',
            }
        })
    </script>
@endpush

@section('title', 'Integración de Mercado Pago')

@section('content')
    <section class="container text-center">
        <h2>Finalizar compra</h2>
        <p>A continuación deberás ingresar los datos necesarios para completar el proceso de compra.</p>
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
        <div id="mercadopago-btn"></div>
    </section>
@endsection