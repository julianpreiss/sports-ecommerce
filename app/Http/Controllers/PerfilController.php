<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class PerfilController extends Controller
{
    public function miperfil() {

        $usuario = Usuario::select('email', 'rol_id')->where('id','=',(auth()->user()->id))->first()->toArray();

        return view('miperfil', [
        'usuario' => $usuario,
        ]);
    }
}
