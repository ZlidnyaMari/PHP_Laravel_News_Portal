<?php
use App\Http\Controllers\Admin\CategoryController as AdminCategoriesController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\NewsSourceController as AdminNewsSourceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\UsersController as AdminUsersController;

use Illuminate\Support\Facades\Auth;
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

Route::group(['middleware' => 'auth'], static function() {
    Route::get('/account', AccountController::class)->name('account');
    Route::get('/logout', [LoginController::class, 'logout'])->name('account.logout');

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'is_admin'], static function() {
        Route::get('/', AdminController::class)
            ->name('index');
        Route::resource('categories', AdminCategoriesController::class);
        Route::resource('news', AdminNewsController::class);
        Route::resource('source', AdminNewsSourceController::class);
        Route::resource('users', AdminUsersController::class);
});


    Route::get('/', AdminController::class)
        ->name('index');
    Route::resource('categories', AdminCategoriesController::class);
    Route::resource('news', AdminNewsController::class);
    Route::resource('source', AdminNewsSourceController::class);});

Route::group(['prefix' => ''], static function() {
    Route::get('/news', [NewsController::class, 'index'])
        ->name('news');
    Route::get('/news/{id}/show', [NewsController::class, 'show'])
        ->where('id', '\d+')
        ->name('news.show');
});

Route::group(['prefix' => ''], static function() {
    Route::get('/categories', [CategoryController::class, 'index'])
        ->name('categories');
    Route::get('/categories/{id}/show', [CategoryController::class, 'show'])
        ->where('id', '\d+')
        ->name('categories.show');
});

Route::group(['prefix' => 'form'], static function() {
    Route::resource('feedback', FeedbackController::class);
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
