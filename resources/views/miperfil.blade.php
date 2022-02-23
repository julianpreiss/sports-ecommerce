@extends('layouts.main')

@section('title', 'Mi Perfil')

@section('content')

<section class="text-center offset-md-1 col-md-10 container mt-3">
    <h2 class="col-12 text-center">Mi Perfil</h2>
    <?php
    print_r($usuario);
    ?>


</section>

@endsection