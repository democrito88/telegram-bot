<?php

use Illuminate\Support\Facades\Route;
use \App\Notifications\TelegramNotification;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*Route::post('mensagem', function () {
    Auth::user()->notify(new TelegramNotification());
})->name('mensagem');*/

Route::post('mensagem', 'mensagemController@enviar')->name('mensagem');

Route::post('email', 'emailController@enviar')->name('email');
