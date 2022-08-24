<?php

use App\Http\Controllers\CidadeController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::redirect('/', '/cliente', 301);
Route::get('/cliente', [ClienteController::class, "index"])->name("cliente.gerenciar");
Route::post("/cliente", [ClienteController::class, "incluir"])->name("cliente.incluir");

Route::get("/estado", [EstadoController::class, "listar"])->name("estado.listar");
Route::get("/cidade/{CodigoEstado}", [CidadeController::class, "listar"])->name("cidade.listar");
