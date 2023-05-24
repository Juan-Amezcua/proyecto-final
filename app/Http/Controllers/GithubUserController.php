<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class GithubUserController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect('/');
    }

    public function handleProviderCallback()
    {
        $githubUser = Socialite::driver('github')->user();

        // Ingreso usuario
        $user = User::firstOrCreate([
            'provider_id' => $githubUser->getId(),
            'email' => $githubUser->getEmail(),
            'name' => $githubUser->getNickname(),
        ]);

        // Se logea el usuario
        auth()->login($user, true);

        // Se redirecciona al usuario
        return redirect('/')->with('mensaje', 'Usuario ingresado');
    }
}
