<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\MercadoPagoController;
use App\Http\Controllers\CarritoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Secciones Web

Route::get('/', [HomeController::class, 'home'])
->name('home');

Route::get('productos', [ProductosController::class, 'productos'])
->name('productos');

Route::get('productos/{id}', [ProductosController::class, 'detallesproducto'])
->name('detallesproducto');

Route::get('blog', [BlogController::class, 'articulos'])
->name('blog');

Route::get('blog/{id}', [BlogController::class, 'detallesarticulo'])
->name('detallesarticulo');

Route::get('carrito/micarrito', [CarritoController::class, 'micarrito'])
->name('carrito.micarrito');

Route::get('miperfil', [PerfilController::class, 'miperfil'])
->name('miperfil');

/*
    |--------------------------------------------------------------------------
    | Autenticación
    |--------------------------------------------------------------------------
*/ 

Route::get('iniciar-sesion', [AuthController::class, 'loginForm'])
    ->name('auth.loginForm');

Route::post('iniciar-sesion', [AuthController::class, 'login'])
->name('auth.login');

Route::get('registrarse', [AuthController::class, 'registerForm'])
->name('auth.registrarseForm');

Route::post('registrarse', [AuthController::class, 'register'])
->name('auth.registrarse');

Route::post('cerrar-sesion', [AuthController::class, 'logout'])
    ->name('auth.logout');


/*
    |--------------------------------------------------------------------------
    | Panel de administrador
    |--------------------------------------------------------------------------
*/ 

Route::get('panel', [AdminController::class, 'homeadmin'])
->name('admin.panel')
->middleware(['admin']);

//Productos

Route::get('panelproductos', [AdminController::class, 'productosadmin'])
->name('admin.productos')
->middleware(['admin']);

Route::get('panelproductos/agregar', [AdminController::class, 'createForm'])
->name('admin.agregarproductoForm')
->middleware(['admin']);

Route::post('panelproductos/agregar', [AdminController::class, 'create'])
->name('admin.agregarproducto')
->middleware(['admin']);

Route::get('panelproductos/{id}', [AdminController::class, 'show'])
->name('admin.detallesproducto')
->whereNumber('id')
->middleware(['admin']);

Route::delete('panelproductos/{id}/eliminar', [AdminController::class, 'delete'])
->name('admin.eliminarproducto')
->whereNumber('id')
->middleware(['admin']);

Route::get('panelproductos/{id}/editar', [AdminController::class, 'editForm'])
->name('admin.editarproductoForm')
->whereNumber('id')
->middleware(['admin']);

Route::put('panelproductos/{id}/editar', [AdminController::class, 'edit'])
->name('admin.editarproducto')
->whereNumber('id')
->middleware(['admin']);

//Articulos

Route::get('panelarticulos', [AdminController::class, 'articulosadmin'])
->name('admin.articulos')
->middleware(['admin']);

Route::get('panelarticulos/agregar', [AdminController::class, 'createFormArticulos'])
->name('admin.agregararticuloForm')
->middleware(['admin']);

Route::post('panelarticulos/agregar', [AdminController::class, 'createArticulos'])
->name('admin.agregararticulo')
->middleware(['admin']);

Route::get('panelarticulos/{id}', [AdminController::class, 'showArticulos'])
->name('admin.detallesarticulo')
->whereNumber('id')
->middleware(['admin']);

Route::delete('panelarticulos/{id}/eliminar', [AdminController::class, 'deleteArticulos'])
->name('admin.eliminararticulo')
->whereNumber('id')
->middleware(['admin']);

Route::get('panelarticulos/{id}/editar', [AdminController::class, 'editFormArticulos'])
->name('admin.editararticuloForm')
->whereNumber('id')
->middleware(['admin']);

Route::put('panelarticulos/{id}/editar', [AdminController::class, 'editArticulos'])
->name('admin.editararticulo')
->whereNumber('id')
->middleware(['admin']);


//Usuarios

Route::get('panelusuarios', [AdminController::class, 'usuariosadmin'])
->name('admin.usuarios')
->middleware(['admin']);


//Carrito y MercadoPago checkout

Route::post('productos/{idproducto}', [CarritoController::class, 'add'])
->name('carrito.agregaralcarrito');

Route::post('productos/sumar/{idproducto}', [CarritoController::class, 'addone'])
->name('carrito.sumarunidad');

Route::post('productos/eliminar/{idproducto}', [CarritoController::class, 'deleteone'])
->name('carrito.eliminarunidad');

Route::post('carrito/vaciar', [CarritoController::class, 'empty'])
->name('carrito.vaciar');

Route::post('carrito/eliminarproducto/{idproducto}', [CarritoController::class, 'deleteproducto'])
->name('carrito.eliminarproducto');

Route::get('carrito/checkout', [MercadoPagoController::class, 'checkout'])
    ->name('carrito.checkout');

Route::get('pago/completo', [MercadoPagoController::class, 'pagocompleto'])
    ->name('pago.pagocompleto');

Route::get('mp/pendiente', [MercadoPagoController::class, 'pagopendiente'])
    ->name('mp.pagopendiente');

Route::get('mp/fallido', [MercadoPagoController::class, 'pagofallido'])
    ->name('mp.pagofallido');