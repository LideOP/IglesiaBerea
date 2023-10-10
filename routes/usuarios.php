<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\ReunionesController;
use App\Http\Controllers\Usuarios\UsuarioController;

//Route::get('',[HomeController::class,'index'])->name('admin.home');
//Route::get('',[HomeController::class,'index'])->name('admin.login');

//Route::resource('reuniones',ReunionesController::class)->names('admin.reuniones');

//Route::resource('registro',UsuarioController::class)->names('usuario.crear');

Route::get('registro',[UsuarioController::class,'create'])->name('usuario.create');