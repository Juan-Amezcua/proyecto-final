<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Mostrar formulario de registro
    public function registro()
    {
        return view('users.registro');
    }

    // Crear Nuevo Usuario
    public function guardar(Request $request)
    {
        $camposFormulario = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => 'required|confirmed|min:6'
        ], [
            'name.required' => 'El nombre es obligatorio',
            'name.min' => 'El nombre debe tener minimo 3 caracteres',
            'email.required' => 'El email es obligatorio',
            'email.email' => 'Debe ser un email válido',
            'email.unique' => 'Este email ya está siendo usado por una cuenta',
            'password.required' => 'El password es obligatorio',
            'password.confirmed' => 'Los passwords deben coincidir',
            'password.min' => 'El password debe tener minimo 6 caracteres'
        ]);

        /* Encriptar Password
        $camposFormulario['password'] = bcrypt($camposFormulario['password']); */

        // Crear Usuario
        $user = User::create($camposFormulario);

        // Ingresar
        auth()->login($user);

        return redirect('/')->with('mensaje', 'Usuario creado e ingresado');
    }

    // Terminar Sesión Usuario
    public function salir(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('mensaje', 'Tu sesión ha terminado');
    }

    // Mostrar formulario para ingresar
    public function entrar()
    {
        return view('users.entrar');
    }

    // Autenticar Usuario
    public function autenticar(Request $request)
    {
        $camposFormulario = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($camposFormulario)) {
            $request->session()->regenerate();

            return redirect('/')->with('mensaje', 'Haz ingresado');
        }
        return back()->withErrors(['email' => 'Datos Incorrectos'])->onlyInput('email');
    }
}
