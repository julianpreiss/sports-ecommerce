<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MercadoPago\Preference;
use MercadoPago\Item;
use App\Models\Producto;
use App\Models\Carrito;

class MercadoPagoController extends Controller
{
    public function checkout() {

        $preference = new Preference();

        $misproductos = Carrito::select('idproducto')->where('idusuario','=',(auth()->user()->id))->get()->pluck('idproducto')->toArray();
        
        /** @var Producto[] $productosarray */
        if($misproductos) {
            $productosarray = [];
            foreach($misproductos as $id)
            {
                $matchingproduct = Producto::where('id','=', $id)->first()->toArray();
                $matchingproductunities = Carrito::where('idusuario','=',(auth()->user()->id))->where('idproducto','=',($id))->first()->toArray();
                $matchingproduct['unidades'] = $matchingproductunities['unidades'];
                array_push($productosarray, $matchingproduct);
            };
        }



        $items = [];

        foreach($productosarray as $producto) {
            $item = new Item();
            $item->title = $producto['nombre'];
            $item->unit_price = $producto['precio'];
            $item->quantity = $producto['unidades'];
            $items[] = $item;
        }

        $preference->items = $items;

        $preference->back_urls = [
            'success' => route('pago.pagocompleto'),
            'pending' => route('pago.pagopendiente'),
            'failure' => route('mp.pagofallido'),
        ];

        $preference->save();

        return view('carrito.checkout', ['preference' => $preference, 'productos' => $productosarray]);
    }

    public function pagocompleto(Request $request)
    {
        echo "Transacción exitosa";
        dd($request);
    }

    public function pagopendiente(Request $request)
    {
        echo "Transacción pendiente";
        dd($request);
    }

    public function pagofallido(Request $request)
    {
        echo "Transacción fallida";
        dd($request);
    }
}
