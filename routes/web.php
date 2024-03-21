<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::group(['middleware' => ['auth'], 'prefix' => 'user', 'as' => 'user.'], function () {

    Route::get('/home', [UserController::class, 'home'])->name('home');
    
    Route::get('/produtos', [UserController::class, 'product'])->name('product');

    Route::get('/categorias', [UserController::class, 'category'])->name('category');

    Route::get('/marcas', [UserController::class, 'brand'])->name('brand');

    Route::get('/admin', [UserController::class, 'admin'])->name('admin');

    Route::get('/permission/{user}', [UserController::class, 'permission'])->name('permission');
    Route::post('/permission/{user}', [UserController::class, 'update_permission'])->name('update.permission');

    Route::get('/error', function () {
        return view('user.error');
    })->name('error');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
