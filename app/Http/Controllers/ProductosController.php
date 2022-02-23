<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductosController extends Controller
{

    public function productos() {

        $productos = Producto::all();

        return view('productos', [
        'productos' => $productos,
        ]);
    }

    public function detallesproducto($id) {

        $producto = Producto::findOrFail($id);

        return view('detallesproducto', [
            'producto' => $producto,
            ]);        
    }
}
