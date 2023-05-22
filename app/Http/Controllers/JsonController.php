<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class JsonController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        $roles = Role::all();

        $data = ['success' => true, 'usuarios' => $usuarios, "roles" => $roles];

        return response()->json($data, 200, []);
    }
}
