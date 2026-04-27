<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LidController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

//welkom pagina
Route::get('/', function () {
    return view('login');
})->name('login');

//dashboard pagina
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//leden pagina
Route::get('/leden', function(){
    return view('leden');
});

//Gebruiker info pagina
Route::get('/gebruiker_info', function(){
    return view('gebruiker_info');
})->name('gebruiker_info');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
