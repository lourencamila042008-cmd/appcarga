<?php

use App\Http\Controllers\PedidosController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(PedidosController::class)->group(function (){
Route::post('/pedidos/{id}/chat', [PedidosController::class, 'chat']);    
Route::get('/pedidos',[PedidosController::class, 'index'])->name('pedidos.index');
Route::get('/pedidos', [PedidosController::class, 'edit'])->name('pedidos.edit');
    Route::patch('/pedidos', [PedidosController::class, 'update'])->name('pedidos.update');
    Route::delete('/pedidos', [PedidosController::class, 'destroy'])->name('pedidos.destroy');
});



require __DIR__.'/auth.php';
