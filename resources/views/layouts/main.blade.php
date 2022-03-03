<!DOCTYPE HTML>
<html lang="es-AR">
<head>
	<meta charset="UTF-8" />
    <title>Sport Cracks :: @yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/x-icon" href="{{url ('favicon.ico') }}" />
	<link rel="stylesheet" type="text/css" href="{{url ('css/bootstrap.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{url ('css/estilos.css') }}" />
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="<?= route('home');?>">Sport Cracks</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto text-center">
					<li class="nav-item"><a class="nav-link" href="<?= route('home');?>">Home</a></li>
					<li class="nav-item"><a class="nav-link" href="<?= route('productos');?>">Productos</a></li>
					<li class="nav-item"><a class="nav-link" href="<?= route('blog');?>">Blog</a></li>
				@auth
				<?php if (auth()->check() && auth()->user()->rol_id === 1){ ?>
					<li class="nav-item"><a class="nav-link" href="<?= route('admin.panel');?>">Admin Panel</a></li>
				<?php } ?>
					<li class="nav-item"><a class="nav-link" href="<?= route('carrito.micarrito');?>">Mi Carrito</a></li>
					<li class="nav-item"><a class="nav-link" href="<?= route('miperfil');?>">Mi Perfil</a></li>
					<li class="nav-item d-flex justify-content-center">
					<form action="{{ route('auth.logout') }}" method="post">
						@csrf
						<button class="btn nav-link" type="submit">Cerrar Sesión ({{ auth()->user()->nombre }})</button>
					</form>
					</li>
				@elseguest
					<li class="nav-item">
						<a class="nav-link" href="<?= route('auth.loginForm');?>">Login</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= route('auth.registrarse');?>">Registrarse</a>
					</li>
				@endauth
				</ul>
			</div>
		</nav> 
	</header>   
	<section class="container-fluid bg d-flex justify-content-center">
		<div class="row darkbg">
		<div class="col-12 d-flex align-items-center justify-content-center">
			<h1>Sport Cracks</h1>
		</div>

		</div>
	
	</section>
	<div class="container my-3 pb-3">
		{{-- Session es la clase para manejo de sesiones de Laravel. --}}
		@if(Session::has('message_success'))
		<div class="alert alert-success">{!! Session::get('message_success') !!}</div>
		@elseif(Session::has('message_error'))
		<div class="alert alert-danger">{!! Session::get('message_error') !!}</div>
		@endif			

	</div>
	
	@yield('content')

	<footer class="container-fluid bg-orange pt-5 mt-2">

		<div class="row">
			<div class="offset-2 col-md-6">
				<h2>Navegación</h2>
				<ul class="list-group ul-footer">
					<li>
						<a href="<?= route('home');?>">Home</a>
					</li>
					<li>
						<a href="<?= route('productos');?>">Productos</a>
					</li>
					<li>
						<a href="<?= route('blog');?>">Blog</a>
					</li>
					@auth
					<?php if (auth()->check() && auth()->user()->rol_id === 1){ ?>
					<li>
						<a href="<?= route('admin.panel');?>">Admin Panel</a>
					</li>
					<?php } ?>
				@elseguest
					<li>
						<a href="<?= route('auth.loginForm');?>">Login</a>
					</li>
					<li>
						<a href="<?= route('auth.registrarse');?>">Registrarse</a>
					</li>
				@endauth				
				</ul>
			</div>
			<div class="col-md-4">
				<h2>Carrito y pagos</h2>
				<ul class="list-group ul-footer">
					<li>
						<a href="<?= route('home');?>">Ver mi carrito</a>
					</li>
					<li>
						<a href="<?= route('productos');?>">Pagar</a>
					</li>
				</ul>
			</div>
		</div>

		<div class="row">
			<ul class="text-center col-12 small">
				<li>Copyright &copy; 2021, Sports Cracks</li>
			</ul>
		</div>
	</footer>

	<script src="{{url ('js/jquery.min.js') }}"></script>
	<script src="{{url ('js/bootstrap.bundle.min.js') }}"></script>
	@stack('js')
</body>
</html>