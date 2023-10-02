<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\ReunionesController;

Route::get('',[HomeController::class,'index'])->name('admin.home');
Route::get('',[HomeController::class,'index'])->name('admin.login');

Route::resource('reuniones',ReunionesController::class)->names('admin.reuniones');