<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\ReunionesController;
use App\Http\Controllers\miembros\AsignarController;
use App\Http\Controllers\Miembros\MiembrosController;
use App\Http\Controllers\miembros\PermisoController;
use App\Http\Controllers\miembros\RolesController;
use App\Http\Controllers\miembros\UserController;

use App\Http\Controllers\admin\TalleresConferenciasController;
use App\Http\Controllers\admin\ExpositoresController;
use App\Http\Controllers\admin\ActividadesController;
use App\Livewire\ExpositorAutocomplete;






// Route::get('',[HomeController::class,'index'])->name('admin.home'); #En HomeController retorna la vista index de la carpeta admin
Route::get('',[HomeController::class,'index'])->name('admin.login');
Route::get('login',[HomeController::class,'index']);
Route::get('profile',[HomeController::class,'profile']);
Route::get('vision', [HomeController::class,'vista'])->name('vision');
// Route::post('register',[HomeController::class,'register_login']);

Route::resource('reuniones',ReunionesController::class)->names('admin.reuniones');
Route::get('filtrarDia', [ReunionesController::class, 'filtrarReuniones'])->name('admin.filtrarDia');


// rutas para talleres y conferencias
Route::resource('talleres',TalleresConferenciasController::class)->names('admin.talleres');
// Route::get('talleres',TalleresConferenciasController::class,'FiltrarPorTipoEvento');

//Filtros de eventos por actividad, conferencia y talleres
Route::get('filtroActividades', [TalleresConferenciasController::class, 'filtrarActividades'])->name('admin.filtroActividades');
Route::get('filtroConferencias', [TalleresConferenciasController::class, 'filtrarConferencias'])->name('admin.filtroConferencias');
Route::get('filtrarTalleres', [TalleresConferenciasController::class, 'filtroTalleres'])->name('admin.filtrarTalleres');


Route::resource('expositores',ExpositoresController::class)->names('admin.expositores');
Route::resource('actividades',ActividadesController::class)->names('admin.actividades');


// Rutas para usuarios
//Route::get('registro',[UsuarioController::class,'create'])->name('usuario.create');
Route::resource('miembros',MiembrosController::class)->names('admin.miembros');
Route::post('registro',[MiembrosController::class,'store'])->name('admin.registrar');

Route::resource('roles',RolesController::class)->names('admin.roles');

Route::resource('permisos',PermisoController::class)->names('admin.permisos');

Route::resource('usuarios',AsignarController::class)->names('admin.asignar');

Route::resource('user',UserController::class)->names('admin.users');


//Route::resource('miembros',);

