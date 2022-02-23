<!DOCTYPE HTML>
<html lang="es-AR">
<head>
	<meta charset="UTF-8" />
    <title>Sport Cracks :: @yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
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
					<li class="nav-item"><a class="nav-link" href="<?= route('admin.panel');?>">Home Panel</a></li>
					<li class="nav-item"><a class="nav-link" href="<?= route('admin.productos');?>">Panel de productos</a></li>
					<li class="nav-item"><a class="nav-link" href="<?= route('admin.articulos');?>">Panel de articulos</a></li>
					<li class="nav-item"><a class="nav-link" href="<?= route('admin.usuarios');?>">Listado de usuarios</a></li>
				@auth
				<li class="nav-item">
					<form action="{{ route('auth.logout') }}" method="post">
						@csrf
						<button class="btn nav-link" type="submit">Cerrar Sesión ({{ auth()->user()->email }})</button>
					</form>
				</li>
			@elseguest
			@endauth
				</ul>
			</div>
		</nav>   
	</header>
	<section class="container-fluid bg bgadmin d-flex justify-content-center">
		<div class="row darkbg">
			<div class="col-12 d-flex align-items-center justify-content-center">
				<h1>Sport Cracks - Admin Panel</h1>
			</div>
		</div>
	
	</section>
	<div class="container py-3">
		@if(Session::has('message_success'))
		<div class="alert alert-success">{!! Session::get('message_success') !!}</div>
		@endif	
	</div>
	
	@yield('content')

	<footer class="container mt-5">

		<div class="row">
			<div class="col-12 text-center">
				<h2>Navegación</h2>
				<ul class="list-group">
					<li class="list-group-item">
						<a href="<?= route('home');?>">Home</a>
					</li>
					<li class="list-group-item">
						<a href="<?= route('productos');?>">Productos</a>
					</li>
					<li class="list-group-item">
						<a href="<?= route('blog');?>">Blog</a>
					</li>
					@auth
					<li class="list-group-item">
						<a href="<?= route('admin.panel');?>">Admin Panel</a>
					</li>
				@elseguest
					<li class="list-group-item">
						<a href="<?= route('auth.loginForm');?>">Login</a>
					</li>
					<li class="list-group-item">
						<a href="<?= route('auth.registrarse');?>">Registrarse</a>
					</li>
				@endauth				
				</ul>
			</div>
		</div>

		<div class="row">
			<ul class="text-center col-12">
				<li>Copyright &copy; 2021, Sports Cracks</li>
			</ul>
		</div>
	</footer>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
