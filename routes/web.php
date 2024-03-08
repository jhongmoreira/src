<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Clientes;
use App\Http\Controllers\Drives;
use App\Http\Controllers\Servicos;

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

Route::get('/', [Dashboard::class, 'index'])->name('home');

//Clientes
Route::get('/cadastrar/clientes', [Clientes::class, 'create'])->name('cadastrar-cliente');
Route::post('/cliente/salvar', [Clientes::class, 'store'])->name('salvar-cliente');
Route::get('/clientes', [Clientes::class, 'index'])->name('clientes');
Route::get('/cliente/{id}', [Clientes::class, 'show'])->name('cliente');
Route::get('/editar/cliente/{id}', [Clientes::class, 'edit'])->name('editar-cliente');
Route::post('/update/cliente/{id}', [Clientes::class, 'update'])->name('update-cliente');
Route::get('/apagar/cliente/{id}', [Clientes::class, 'delete'])->name('apagar-cliente');
Route::post('/delete/cliente/{id}', [Clientes::class, 'destroy'])->name('delete-cliente');

Route::get('/servicos', [Servicos::class, 'index'])->name('servicos');
Route::get('/novo/servico', [Servicos::class, 'create'])->name('novo-servico');
Route::get('/editar/servico/{id}', [Servicos::class, 'edit'])->name('editar-servico');
Route::post('/update/servico/{id}', [Servicos::class, 'update'])->name('update-servico');
Route::post('/salvar/servico', [Servicos::class, 'store'])->name('salvar-servico');