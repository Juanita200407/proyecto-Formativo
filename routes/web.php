<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PedidosController;




// use App\Http\Controllers\HomeController;








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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/', [FrontController::class, 'index']);
// Route::get('/', [HomeController::class, 'index']);


Route::get('/menu/{id}', [FrontController::class, 'welcomeByCategoria'])->name('menu.item');

Route::post('/pedidos/{id}', [PedidosController::class, 'create'])->name('pedidos.create');


Route::resource('producto', ProductoController::class)->middleware('auth');
Route::resource('usuarios', UsuariosController::class)->middleware('auth');
Route::resource('categoria', CategoriaController::class)->middleware('auth');
Route::resource('pedidos', PedidosController::class)->middleware('auth');
Route::resource('welcome', FrontController::class);







