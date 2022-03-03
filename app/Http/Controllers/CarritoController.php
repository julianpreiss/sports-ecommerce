<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrito;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{

    public function add(Request $request, $idproducto) {

        if (auth()->check() && auth()->user()->rol_id === 1){
            return redirect()
            ->route('productos')
            ->with('message_error', 'Los administradores no pueden realizar compras en la web');
        }

        $input['idproducto'] = $idproducto;
        $input['unidades'] = $request -> input('unidades');
        $id = auth()->user()->id;
        $input['idusuario'] = $id;

        $alreadyexist = Carrito::where('idusuario','=',(auth()->user()->id))->where('idproducto','=',$idproducto)->first();
        if($alreadyexist) {
            $input['unidades'] = $alreadyexist['unidades'] + $input['unidades'];
            $alreadyexist->update($input);
        } else {
            Carrito::create($input);
        }

        return redirect()
        ->route('productos')
        ->with('message_success', 'El producto ha sido agregado al carrito');

    }

    public function micarrito() {

        $misproductos = Carrito::select('idproducto')->where('idusuario','=',(auth()->user()->id))->get()->pluck('idproducto')->toArray();

        if($misproductos) {
            $productosarray = [];
            foreach($misproductos as $id)
            {
                $matchingproduct = Producto::where('id','=', $id)->first()->toArray();
                $matchingproductunities = Carrito::where('idusuario','=',(auth()->user()->id))->where('idproducto','=',($id))->first()->toArray();
                $matchingproduct['unidades'] = $matchingproductunities['unidades'];
                array_push($productosarray, $matchingproduct);
            };

            return view('carrito.micarrito', [
            'productosarray' => $productosarray,
            ]);        
        } else {
            return view('carrito.micarrito', [
                'productosarray' => null,
                ]);  
        }
    }

    public function empty() {

        $productos = Carrito::select()->where('idusuario','=',(auth()->user()->id));

        $productos->delete();
        
        return redirect()
        ->route('carrito.micarrito')
        ->with('message_success', 'Tu carrito ha sido vaciado');       
    }

    public function deleteproducto(Request $request, $idproducto) {

        $producto = Carrito::select()->where('idusuario','=',(auth()->user()->id))->where('idproducto','=',($idproducto));

        $producto->delete();
        
        return redirect()
        ->route('carrito.micarrito')
        ->with('message_success', 'El producto ha sido eliminado del carrito');       
    }

    public function addone(Request $request, $idproducto) {

        $producto = Carrito::select()->where('idusuario','=',(auth()->user()->id))->where('idproducto','=',($idproducto))->first();

        $productoeditado['idproducto'] = $idproducto;
        $productoeditado['unidades'] = $producto['unidades'] + 1;
        $productoeditado['idusuario'] = (auth()->user()->id);

        $producto->update($productoeditado);
        
        return redirect()
        ->route('carrito.micarrito')
        ->with('message_success', 'Se ha agregado una unidad del producto');       
    }

    public function deleteone(Request $request, $idproducto) {

        $producto = Carrito::select()->where('idusuario','=',(auth()->user()->id))->where('idproducto','=',($idproducto))->first();

        $productoeditado['idproducto'] = $idproducto;
        $productoeditado['unidades'] = $producto['unidades'] - 1;
        $productoeditado['idusuario'] = (auth()->user()->id);

        $producto->update($productoeditado);
        
        return redirect()
        ->route('carrito.micarrito')
        ->with('message_success', 'Se ha restado una unidad del producto');       
    }
}