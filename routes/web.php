<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Clientes;
use App\Http\Controllers\Drives;
use App\Http\Controllers\Servicos;
use App\Http\Controllers\Vendas;
use App\Http\Controllers\Orders;
use App\Http\Controllers\Perfils;
use App\Http\Controllers\Pastas;
use App\Http\Controllers\Publicos;
use App\Http\Controllers\Notes;
use App\Http\Controllers\Kanbans;
use App\Http\Controllers\KanbanNames;

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

Route::get('/', [Dashboard::class, 'index'])->name('home')->middleware('auth');
Route::get('/perfil', [Perfils::class, 'index'])->name('perfil')->middleware('auth');
Route::post('/perfil/salvar/{id}', [Perfils::class, 'update'])->name('perfil-salvar')->middleware('auth');

//Clientes
Route::get('/cadastrar/clientes', [Clientes::class, 'create'])->name('cadastrar-cliente')->middleware('auth');
Route::post('/cliente/salvar', [Clientes::class, 'store'])->name('salvar-cliente')->middleware('auth');
Route::get('/clientes', [Clientes::class, 'index'])->name('clientes')->middleware('auth');
Route::get('/cliente/{id}', [Clientes::class, 'show'])->name('cliente')->middleware('auth');
Route::get('/editar/cliente/{id}', [Clientes::class, 'edit'])->name('editar-cliente')->middleware('auth');
Route::post('/update/cliente/{id}', [Clientes::class, 'update'])->name('update-cliente')->middleware('auth');
Route::get('/apagar/cliente/{id}', [Clientes::class, 'delete'])->name('apagar-cliente')->middleware('auth');
Route::post('/delete/cliente/{id}', [Clientes::class, 'destroy'])->name('delete-cliente')->middleware('auth');

Route::get('/servicos', [Servicos::class, 'index'])->name('servicos')->middleware('auth');
Route::get('/novo/servico', [Servicos::class, 'create'])->name('novo-servico')->middleware('auth');
Route::get('/editar/servico/{id}', [Servicos::class, 'edit'])->name('editar-servico')->middleware('auth');
Route::post('/update/servico/{id}', [Servicos::class, 'update'])->name('update-servico')->middleware('auth');
Route::post('/salvar/servico', [Servicos::class, 'store'])->name('salvar-servico')->middleware('auth');

Route::get('/vendas', [Vendas::class, 'index'])->name('vendas')->middleware('auth');
Route::get('/vendas/abertas/', [Vendas::class, 'indexAbertas'])->name('vendas-abertas')->middleware('auth');
Route::get('/vendas/pagas/', [Vendas::class, 'indexPagas'])->name('vendas-pagas')->middleware('auth');
Route::get('/nova/venda', [Vendas::class, 'create'])->name('nova-venda')->middleware('auth');
Route::post('/salvar/venda', [Vendas::class, 'store'])->name('salvar-venda')->middleware('auth');
Route::get('/editar/venda/{id}', [Vendas::class, 'edit'])->name('editar-venda')->middleware('auth');
Route::post('/update/venda/{id}', [Vendas::class, 'update'])->name('update-venda')->middleware('auth');
Route::get('/apagar/venda/{id}', [Vendas::class, 'delete'])->name('apagar-venda')->middleware('auth');
Route::post('/delete/venda/{id}', [Vendas::class, 'destroy'])->name('delete-venda')->middleware('auth');
Route::get('/venda/{id}', [Vendas::class, 'show'])->name('venda');
Route::get('/fatura/{id}', [Vendas::class, 'invoice'])->name('fatura');

Route::get('/ordens', [Orders::class, 'index'])->name('ordens')->middleware('auth');
Route::get('/ordens/abertas', [Orders::class, 'indexAbertas'])->name('ordens-abertas')->middleware('auth');
Route::get('/ordens/fechadas', [Orders::class, 'indexFechadas'])->name('ordens-fechadas')->middleware('auth');
Route::get('/nova/ordem', [Orders::class, 'create'])->name('nova-ordem')->middleware('auth');
Route::post('/salvar/ordem', [Orders::class, 'store'])->name('salvar-ordem')->middleware('auth');
Route::get('/editar/ordem/{id}', [Orders::class, 'edit'])->name('editar-ordem')->middleware('auth');
Route::post('/update/ordem/{id}', [Orders::class, 'update'])->name('update-ordem')->middleware('auth');
Route::post('/delete/ordem/{id}', [Orders::class, 'destroy'])->name('apagar-ordem')->middleware('auth');

Route::get('/pastas', [Pastas::class, 'index'])->name('pastas')->middleware('auth');
Route::get('/publico', [Publicos::class, 'index'])->name('publico');

Route::get('/notas', [Notes::class, 'index'])->name('notas');
Route::get('/notas/salvar', [Notes::class, 'store'])->name('salvar-nota');
Route::post('/notas/apagar/{id}', [Notes::class, 'destroy'])->name('deletar-nota');

Route::get('/kanban', [KanbanNames::class, 'index'])->name('kanban');
Route::post('/kanban/novo', [KanbanNames::class, 'store'])->name('kanban-store');
Route::post('/kanban/novo/salvar', [Kanbans::class, 'save'])->name('kanban-new-salvar');

Route::get('/kanbans/{kbn}', [Kanbans::class, 'index'])->name('kanbans');
Route::post('/kanbans/salvar', [Kanbans::class, 'store'])->name('kanban-salvar');
Route::post('/kanbans/prosseguir/{id}', [Kanbans::class, 'prosseguir'])->name('kanban-prosseguir');
Route::post('/kanbans/parar/{id}', [Kanbans::class, 'parar'])->name('kanban-parar');
Route::post('/kanbans/concluir/{id}', [Kanbans::class, 'concluir'])->name('kanban-concluir');



// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
