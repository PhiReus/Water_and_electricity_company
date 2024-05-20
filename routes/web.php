<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('includes.login');
});

Route::group(['middleware' => 'checklogin'], function () {
    //USER
    Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
    Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
    Route::post('/user/show/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('user.show');
    Route::delete('/user/destroy/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');

    //GROUP
    Route::resource('groups',\App\Http\Controllers\GroupController::class);
    Route::post('/groups/getGroup', [App\Http\Controllers\GroupController::class, 'getGroup'])->name('groups.getGroup');
    Route::get('/show/{id}', [\App\Http\Controllers\GroupController::class, 'show'])->name('groups.show');
    Route::put('/saveRoles/{id}', [\App\Http\Controllers\GroupController::class, 'saveRoles'])->name('groups.saveRoles');

    //PROJECTS
    Route::resource('projects', \App\Http\Controllers\ProjectController::class);
    Route::resource('materials', \App\Http\Controllers\MaterialController::class);
    Route::resource('posts', \App\Http\Controllers\PostController::class);
});

Route::get('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('/checkLogin', [App\Http\Controllers\AuthController::class, 'checkLogin'])->name('checkLogin');
Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

