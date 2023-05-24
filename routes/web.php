<?php

use App\Http\Controllers\GithubUserController;
use App\Http\Controllers\CorreoController;
use App\Models\User;
use App\Models\Inmueble;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\InmuebleController;
use App\Http\Controllers\PaypalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Todos los inmuebles
Route::get('/', [InmuebleController::class, 'index'])->name('home');

// Mostrar formulario para crear nuevo correo
Route::get('/correo', [CorreoController::class, 'create'])->middleware('auth');

// Enviar correo
Route::post('/enviar-correo', [CorreoController::class, 'enviar'])->name('enviar-correo');

// Autenticación mediante credenciales de terceros (GitHub) - Redirección
Route::get('/auth/github/redirect', [GithubUserController::class, 'redirectToProvider']);

// Autenticación mediante credenciales de terceros (GitHub) - Manejo
Route::get('/auth/github/callback', [GithubUserController::class, 'handleProviderCallback']);

// Sistema de pago Paypal
Route::post('paypal/pago', [PaypalController::class, 'pago'])->name('paypal.pago');

Route::get('paypal/exito', [PaypalController::class, 'exito'])->name('paypal.exito');

Route::get('paypal/cancelado', [PaypalController::class, 'cancelado'])->name('paypal.cancelado');

// Mostrar formulario para crear nuevo anuncio
Route::get('/inmuebles/create', [InmuebleController::class, 'create'])->middleware('auth');

// Almacenar información del anuncio
Route::post('/inmuebles', [InmuebleController::class, 'store'])->middleware('auth');

// Mostrar formulario para editar
Route::get('/inmuebles/{inmueble}/edit', [InmuebleController::class, 'edit'])->middleware('auth');

// Actualización del inmueble
Route::put('/inmuebles/{inmueble}', [InmuebleController::class, 'update'])->middleware('auth');

// Eliminar anuncio
Route::delete('/inmuebles/{inmueble}', [InmuebleController::class, 'destroy'])->middleware('auth');

// Gestionar Anuncios
Route::get('/inmuebles/gestion', [InmuebleController::class, 'gestion'])->middleware('auth');

// Un solo inmueble
Route::get('/inmuebles/{inmueble}', [InmuebleController::class, 'show']);

// Mostrar formulario de registro
Route::get('/registro', [UserController::class, 'registro'])->middleware('guest');

// Crear nuevo usuario
Route::post('/users', [UserController::class, 'guardar']);

// Terminar Sesión Usuario
Route::post('/salir', [UserController::class, 'salir'])->middleware('auth');

// Mostrar formulario para ingresar
Route::get('/entrar', [UserController::class, 'entrar'])->name('entrar')->middleware('guest');

// Ingresar Usuario
Route::post('/users/autenticar', [UserController::class, 'autenticar']);

// Gestionar Anuncios
Route::get('/inmuebles/gestion', [InmuebleController::class, 'gestion']);
