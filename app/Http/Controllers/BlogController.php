<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function articulos() {

        $articulos = Articulo::all();

        return view('blog', [
        'articulos' => $articulos,
        ]);
    }

    public function detallesarticulo($id) {


        $articulo = Articulo::findOrFail($id);

        return view('detallesarticulo', [
            'articulo' => $articulo,
            ]);        
    }


    public function panel() {
        return view('admin.panel');        
    }
}