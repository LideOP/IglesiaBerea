<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\ReunionesController;
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
// rutas para talleres y conferencias
Route::resource('talleres',TalleresConferenciasController::class)->names('admin.talleres');
Route::resource('expositores',ExpositoresController::class)->names('admin.expositores');
Route::resource('actividades',ActividadesController::class)->names('admin.actividades');


//Route::resource('miembros',);
