<?php

use App\Http\Controllers\TarefaController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home')
    ->middleware('verified');
Route::resource('tarefa', TarefaController::class)
    ->middleware('verified');

Route::get('/mensagem-teste', function () {
    return new \App\Mail\MensagemTesteMail();
    //    \Illuminate\Support\Facades\Mail::to('ficechin@hotmail.com')->send(new \App\Mail\MensagemTesteMail());
    //    return 'E-mail enviado';
});
