<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usuarios\UsuarioController;
use GuzzleHttp\Promise\Create;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');
    //xd
});





// Rutas para usuarios
//Route::get('registro',[UsuarioController::class,'create'])->name('usuario.create');