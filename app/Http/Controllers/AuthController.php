<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credenciales = $request->only(['email', 'password']);

        if(!auth()->attempt($credenciales)) {
            
            return redirect()
                ->route('auth.loginForm')   
                ->with('message_error', 'Alguno/s de los datos ingresados es incorrecto')            
                ->withInput();
        }

            /** @var Usuario $user */
            $user = auth()->user();

            return redirect()
                ->route('home')
                ->with('message_success', 'Bienvenido/a a nuestra web, <b>' . $user->email . '</b>');
        }
    
        public function logout()
        {
            auth()->logout();
    
            return redirect()
                ->route('auth.loginForm')
                ->with('message_success', 'Tu sesión se ha cerrado');
        }

        public function registerForm()
        {
            return view('auth.registrarse');
        }

        public function register(Request $request)
        {

            $input = $request->input();

            $request->validate(Usuario::rules(), Usuario::rulesMessages());

            $usuario = Usuario::create([
                'email' => $input['email'], 
                'password' => bcrypt($input['password']), 
                'rol_id'=>2
            ]);

            return redirect() 
            ->route('auth.login')
            ->with('message_success', 'El proceso de registro fue exitoso. Ya podés iniciar sesión con el mail ' . $usuario->email);
        }
}
