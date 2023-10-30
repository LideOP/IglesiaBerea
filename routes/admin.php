<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\ReunionesController;
use App\Http\Controllers\miembros\AsignarController;
use App\Http\Controllers\Miembros\MiembrosController;
use App\Http\Controllers\miembros\PermisoController;
use App\Http\Controllers\miembros\RolesController;
use App\Http\Controllers\miembros\UserController;

Route::get('',[HomeController::class,'index'])->name('admin.home');
// Route::get('',[HomeController::class,'index'])->name('admin.login');

Route::resource('reuniones',ReunionesController::class)->names('admin.reuniones');

// Rutas para usuarios
//Route::get('registro',[UsuarioController::class,'create'])->name('usuario.create');
Route::resource('miembros',MiembrosController::class)->names('admin.miembros');
Route::post('registro',[MiembrosController::class,'store'])->name('admin.registrar');

Route::resource('roles',RolesController::class)->names('admin.roles');

Route::resource('permisos',PermisoController::class)->names('admin.permisos');

Route::resource('usuarios',AsignarController::class)->names('admin.asignar');

Route::resource('user',UserController::class)->names('admin.users');
