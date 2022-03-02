<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Articulo;
use App\Models\Usuario;
use App\Models\Pago;
use App\Models\Tematica;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    
    function homeadmin() {

        $pagos = Pago::select('idproducto', 'iduser', 'unidades')->get()->toArray();

        foreach($pagos as &$pago) {
            $unidades = $pago['unidades'];
            $pago = Producto::select('precio', 'nombre')->where('id','=',$pago['idproducto'])->first()->toArray();
            $pago['unidades'] = $unidades;
            // array_push($productos, $producto);
        }

        return view('admin.panel', [
            'pagos' => $pagos
        ]);
    }
    
    /*
    |--------------------------------------------------------------------------
    | Productos
    |--------------------------------------------------------------------------
    */

    public function productosadmin() {

        $productos = Producto::all();

        return view('admin.productos', [
        'productos' => $productos,
        ]);
    }
    
    public function show($id) {

        $producto = Producto::findOrFail($id);

        return view('admin.detallesproducto', [
            'producto' => $producto,
            ]);        
    }

    public function createForm()
    {

        return view('admin.agregarproducto');
    }

    public function create(Request $request) {

        $input = $request->input();

        $request->validate(Producto::rules(), Producto::rulesMessages());

        if($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreimagen = time() . "." . $imagen->clientExtension();
            $imagen->move(public_path('img'), $nombreimagen);
            // $imagen->storeAs('', $nombreimagen, 'public_imgs');
            $input['imagen'] = $nombreimagen;
        }

        $producto = Producto::create($input);

        return redirect()
        ->route('admin.productos')
        ->with('message_success', 'El producto ' . e($producto->nombre) . ' ha sido cargado con éxito');

    }

    public function delete($id) {
        $producto = Producto::findOrFail($id);

        $producto->delete();

        return redirect()
        ->route('admin.productos')
        ->with('message_success', 'El producto ' . e($producto->nombre) . ' ha sido eliminado');
    }

    public function editForm($id) {
        
        $producto = Producto::findOrFail($id);

        return view('admin.editarproducto', 
            [
                'producto' => $producto
            ]);
    }

    public function edit(Request $request, $id) {

        $request->validate(Producto::rules(), Producto::rulesMessages());

        $input = $request->input();

        $producto = Producto::findOrFail($id);

        if($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreimagen = time() . "." . $imagen->clientExtension();
            $imagen->move(public_path('img'), $nombreimagen);
            // $imagen->storeAs('', $nombreimagen, 'public_imgs');
            $input['imagen'] = $nombreimagen;
            $imagenvieja = $producto->imagen;
        } else {
            $imagenvieja = null;
        };

        if($request->hasFile('imagen') && $imagenvieja != null) {
            unlink(public_path('img/' . $imagenvieja));
        };

        $producto->update($input);

        return redirect()
        ->route('admin.productos')
        ->with('message_success', 'El producto ' . e($producto->nombre) . ' ha sido editado con éxito');

    }

/*
    |--------------------------------------------------------------------------
    | Artículos
    |--------------------------------------------------------------------------
*/ 

    public function articulosadmin() {

        $articulos = Articulo::with(['tematicas'])->get();

        return view('admin.articulos', [
        'articulos' => $articulos,
        ]);
    }

    public function showArticulos($id) {

        $articulo = Articulo::findOrFail($id);

        return view('admin.detallesarticulo', [
            'articulo' => $articulo,
            ]);        
    }

    public function createFormArticulos()
    {
        $tematicas = Tematica::all();

        $tematicasSeleccionadas = collect(old('tematica_id', []));

        return view('admin.agregararticulo', 
    [
        'tematicas' => $tematicas,
        'tematicasSeleccionadas' => $tematicasSeleccionadas,
    ]);
    }

    public function createArticulos(Request $request) {

        $input = $request->input();

        $request->validate(Articulo::rules(), Articulo::rulesMessages());

        if($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreimagen = time() . "." . $imagen->clientExtension();
            $imagen->move(public_path('img'), $nombreimagen);
            // $imagen->storeAs('', $nombreimagen, 'public_imgs');
            $input['imagen'] = $nombreimagen;
        }

        $articulo = Articulo::create($input);

        $tematicasId = $request->input('tematica_id') ?? [];

        $articulo->tematicas()->attach($tematicasId);

        return redirect()
        ->route('admin.articulos')
        ->with('message_success', 'El articulo ' . e($articulo->titulo) . ' ha sido cargado con éxito');

    }

    public function deleteArticulos($id) {

        $articulo = Articulo::findOrFail($id);

        $articulo->tematicas()->detach();

        $articulo->delete();

        return redirect()
        ->route('admin.articulos')
        ->with('message_success', 'El articulo ' . e($articulo->titulo) . ' ha sido eliminado');
    }

    public function editFormArticulos($id) {

        $tematicas = Tematica::all();
        $articulo = Articulo::findOrFail($id);

        $tematicasSeleccionadas = collect(old('tematica_id', $articulo->tematicas->pluck('tematica_id')));

        return view('admin.editararticulo', 
            [
                'articulo' => $articulo,
                'tematicas' => $tematicas,
                'tematicasSeleccionadas' => $tematicasSeleccionadas,
            ]);
    }

    public function editArticulos(Request $request, $id) {

        $request->validate(Articulo::rules(), Articulo::rulesMessages());

        $input = $request->input();

        $articulo = Articulo::findOrFail($id);

        if($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreimagen = time() . "." . $imagen->clientExtension();
            $imagen->move(public_path('img'), $nombreimagen);
            // $imagen->storeAs('', $nombreimagen, 'public_imgs');
            $input['imagen'] = $nombreimagen;
            $imagenvieja = $articulo->imagen;
            } else {
                $imagenvieja = null;
            };

        if($request->hasFile('imagen') && $imagenvieja != null) {
            unlink(public_path('img/' . $imagenvieja));
        };

        $articulo->update($input);

        $tematicasId = $request->input('tematica_id') ?? [];

        $articulo->tematicas()->sync($tematicasId);

        return redirect()
        ->route('admin.articulos')
        ->with('message_success', 'El articulo ' . e($articulo->titulo) . ' ha sido editado con éxito');

    }

/*
    |--------------------------------------------------------------------------
    | Usuarios
    |--------------------------------------------------------------------------
*/ 
    public function usuariosadmin() {

        $usuarios = Usuario::with(['rol'])->get();

        return view('admin.usuarios', [
        'usuarios' => $usuarios,
        ]);
    }

};