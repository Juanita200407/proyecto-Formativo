<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DetalleFacturaController;

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

// Route::get('/pedidos/{id}', [PedidosController::class, 'datos'])->name('pedidos.create');


Route::get('/pedidos/{id}', [PedidosController::class, 'create2'])->name('pedidos.create2')->middleware('auth');

Route::get('/pedido/{id}', [PedidoController::class, 'create'])->name('pedido.create')->middleware('auth');

Route::get('/pedido/{id}', [PedidosController::class, 'show2'])->name('pedidos.show2');



Route::post('/pedido/{id}', [PedidosController::class, 'edit2'])->name('pedidos.edit2');


Route::resource('producto', ProductoController::class)->middleware('auth');
Route::resource('usuarios', UsuariosController::class)->middleware('auth');
Route::resource('categoria', CategoriaController::class)->middleware('auth');
Route::resource('pedidos', PedidosController::class)->middleware('auth');
Route::resource('comprar', ComprasController::class)->middleware('auth');
Route::resource('carritos', CarritoController::class)->middleware('auth');
Route::resource('clientes', ClienteController::class)->middleware('auth');
Route::resource('factura', DetalleFacturaController::class)->middleware('auth');
Route::get('ver-pedido/{id}', [DetalleFacturaController::class, 'show'])->name('verPedido')->middleware('auth');





Route::resource('welcome', FrontController::class)->middleware('auth');







