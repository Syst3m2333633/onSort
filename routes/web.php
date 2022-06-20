<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VilleController;
use App\Http\Controllers\CampusController;
use App\Http\Controllers\SortieController;
use Illuminate\Session\Middleware\AuthenticateSession;
use phpDocumentor\Reflection\Types\Resource_;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', 'App\Http\Controllers\WelcomeController@index');

Route::get('logout', 'App\Http\Controllers\Auth\AuthenticatedSessionController@destroy');

require __DIR__.'/auth.php';

// Route::get('/sorties/create', [SortieController::class, 'create']);
// Route::post('/sorties/create', [SortieController::class, 'sortieSend']);
// Route::get('/{id}/edit', [SortieController::class, 'edit']);
// Route::get('/{id}/update', [SortieController::class, 'update'])->name('sorties.update');
Route::resource('sortie', SortieController::class);

Route::get('/profils/profil', [UserController::class, 'create']);
Route::post('/profils/profil', [UserController::class, 'userSend']);

Route::get('campus/create', [CampusController::class, 'create']);
Route::post('campus/create', [CampusController::class, 'campusSend']);

Route::delete('campus/{id}', [CampusController::class, 'destroy'])->name('campus.destroy');

Route::get('villes/create', [VilleController::class, 'create'])->name('villes.create');
Route::post('villes/create', [VilleController::class, 'villeSend']);


// Route::resource('ville', VilleController::class);
Route::delete('/villes/{id}', [VilleController::class, 'destroy'])->name('villes.destroy');


// Route::get('/campus/{id}', [CampusController::class, 'edit']);
// Route::post('/campus/{id}', [CampusController::class, 'campusSend']);


Route::get('/dashboard', [App\Http\Controllers\WelcomeController::class, 'index'])->name('dashboard');
