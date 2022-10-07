<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\CommuContoller;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::controller(Controller::class)->group(function () {
    Route::get('/', 'homepage')->name('homepage');
    Route::get('/commu', 'post')->name('post');
    
});

Route::middleware(['auth'])->group(function () {

    Route::controller(CommentaireController::class)->group(function () {
        Route::post('/commentaire/store', 'store')->name('commentaire.store');
    });

    Route::controller(PostController::class)->group(function () {
        Route::post('/post', 'store')->name('post.store');
        Route::post('/test', 'storetest')->name('test.edit');
    });


    Route::controller(CommuContoller::class)->group(function () {
        Route::post('/communaute', 'store')->name('communaute.store');
        Route::post('/test', 'storetest')->name('test.edit');
       
    });


});

Route::middleware(['admin'])->group(function () {

    Route::controller(UserController::class)->group(function () {

        Route::get('/setting','settinguser')->name('setting');
        Route::get('/admin/user','list')->name('list.user');
        Route::post('/admin/user','store')->name('user.store');
        Route::get('admin/user/{id}/edit','edit')->name('user.edit');
        Route::delete('admin/user/delete','delete')->name('user.delete');
        Route::post('admin/user/update','update')->name('user.update');
    });

    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/post','index')->name('admin.post.index');
        Route::post('/admin/post','store')->name('admin.post.store');
        Route::get('admin/post/{id}/edit','edit')->name('admin.post.edit');
        Route::delete('admin/post/delete','delete')->name('admin.post.delete');
        Route::post('admin/post/update','update')->name('admin.post.update');

    });
});

Route::controller(PostController::class)->group(function () {

    Route::get('/showPost', 'show')->name('show');
    Route::get('/test', 'showtest')->name('test');
});



require __DIR__ . '/auth.php';
