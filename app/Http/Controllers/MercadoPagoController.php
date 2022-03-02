<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MercadoPago\Preference;
use MercadoPago\Item;
use App\Models\Producto;
use App\Models\Carrito;
use App\Models\Pago;

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
            'failure' => route('pago.pagofallido'),
        ];

        $preference->save();

        return view('carrito.checkout', ['preference' => $preference, 'productos' => $productosarray]);
    }

    public function pagocompleto(Request $request)
    {
        $productoscomprados = Carrito::select(['idusuario', 'idproducto', 'unidades'])->where('idusuario','=',(auth()->user()->id))->get()->toArray();
        foreach($productoscomprados as &$producto) {
            $producto['created_at'] = \Carbon\Carbon::now()->toDateTimeString();
            $producto['updated_at'] = \Carbon\Carbon::now()->toDateTimeString();
        }
        Pago::insert($productoscomprados);
        Carrito::select()->where('idusuario','=',(auth()->user()->id))->delete();
        // $productoscomprados = Carrito::select()->where('idusuario','=',(auth()->user()->id))->get()->toArray();
        // Pago::create($productoscomprados);
        // foreach ($productosencarrito as $producto) {
        //     $producto->delete();
        // }
        // $productosencarrito->delete();

        return redirect('miperfil')
        ->with('message_success', 'Tu compra fue exitosa!'); 
    }

    public function pagopendiente(Request $request)
    {
        return redirect('miperfil')
        ->with('message_success', 'Proceso exitoso. Pago pendiente de ser realizado'); 
    }

    public function pagofallido(Request $request)
    {
        return redirect()
        ->route('carrito.checkout')
        ->with('message_error', 'Tu compra no pudo ser realizada.'); 
    }
}
