<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;


//This Route for display the welcome page
Route::get('/', function () {
    return view('welcome');
})->name('welcome');



Route::get('/details',[AdminController::class, 'combine'])->name('details');
