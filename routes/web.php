<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Clientes;
use App\Http\Controllers\Drives;

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
