<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Producto;
use App\Models\Pago;

class PerfilController extends Controller
{
    public function miperfil() {

        $usuario = Usuario::select('email', 'nombre', 'apellido')->where('id','=',(auth()->user()->id))->first()->toArray();
        $productoscomprados = Pago::select('idproducto', 'unidades')->where('idusuario','=',(auth()->user()->id))->get()->toArray();
        // $productos = [];
        foreach($productoscomprados as &$producto) {
            $unidades = $producto['unidades'];
            $producto = Producto::select()->where('id','=',$producto['idproducto'])->first()->toArray();
            $producto['unidades'] = $unidades;
            // array_push($productos, $producto);
        }

        return view('miperfil', [
        // 'productos' => $productos,
        'productoscomprados' => $productoscomprados,
        'usuario' => $usuario,
        ]);
    }
}