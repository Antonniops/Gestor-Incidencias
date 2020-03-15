<?php

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


Route::resource('ticket', 'TicketController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Solo accederan aquellos usuarios que sean administradores
Route::get('/admin/tickets', 'AdminController@index')->middleware('admin');
Route::put('/admin/close/{id}', 'AdminController@close')->middleware('admin');
