<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\MusicController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\EventController;

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');

    // profile
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('profile-update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('change-password', [ProfileController::class, 'password'])->name('password.index');
    Route::put('update-password', [ProfileController::class, 'updatePassword'])->name('password.update');

    Route::resource('users', UserController::class);
    Route::get('user-ban-unban/{id}/{status}', 'UserController@banUnban')->name('user.banUnban');
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);

    Route::resource('posts', PostController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('tags', TagController::class);
    Route::resource('musics', MusicController::class);
    Route::post('/musics/import', [MusicController::class, 'import'])->name('musics.import');
    Route::resource('groups', GroupController::class);
    Route::resource('events', EventController::class);

});
