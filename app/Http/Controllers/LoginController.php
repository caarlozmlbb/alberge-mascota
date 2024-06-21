<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(){
        return view('usuario.logine');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'contrasena' => 'required',
        ]);
    
        $usuario = Usuarios::where('email', $request->email)->first();
    
        if (!$usuario || $request->contrasena !== $usuario->contrasena) {
            return back()->with('error', 'Credenciales incorrectas');
        }
    
        // Iniciar sesión manualmente
        session(['usuario_id' => $usuario->id]);
    
        return redirect()->route('index', $usuario->nombre);
    }
    
}




