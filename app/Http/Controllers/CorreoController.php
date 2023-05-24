<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\EnviarCorreo;

class CorreoController extends Controller
{
    public function create()
    {
        return view('correo');
    }

    public function enviar(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'mensaje' => ['required', 'min:20']

        ], [
            'email.required' => 'El email es obligatorio',
            'email.email' => 'Debe ser un email válido',
            'mensaje.required' => 'El mensaje es obligatorio',
            'mensaje.min' => 'El mensaje debe tener minimo 20 caracteres'
        ]);

        Mail::to(request()->email)->send(new EnviarCorreo(request()->mensaje));
        return redirect()->route('home')->with('mensaje', 'Correo enviado con éxito');
    }
}
