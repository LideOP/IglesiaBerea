<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }
}