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

Route::get('/welcome/{name}', static function(string $name): string{
    return "welcome {$name}";
});

Route::get('/info', static function(): string {
    return 'Информация для ознакомления';
});

Route::get('/news', static function(): string {
    return 'Новости на сегодня';
});


