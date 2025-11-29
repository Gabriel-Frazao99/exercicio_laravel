<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;

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

Route::pattern('contact', '[0-9]+');

Route::get('/', fn() => view('home'));
Route::get('/login', fn() => view('auth.login'))->name('login');

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login');
    Route::post('/logout', 'logout');
});

Route::prefix('contacts')->controller(ContactController::class)->group(function () {
    Route::get('/', 'index');

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/create', 'create');
        Route::post('/', 'store');
        Route::get('/{contact}', 'show');
        Route::get('/{contact}/edit', 'edit');
        Route::put('/{contact}', 'update');
        Route::delete('/{contact}', 'destroy');
    });
});
