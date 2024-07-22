<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KetuaController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/*------------------------------------------
--------------------------------------------
All User Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('_users.home');

    // Route untuk profil saya
    Route::get('/user/my-profile', [UserController::class, 'myProfile'])->name('_users.profile.my_profile');
    Route::get('/user/edit-profile', [UserController::class, 'editProfile'])->name('_users.profile.edit_profile');
    Route::get('/user/change-password', [UserController::class, 'changePassword'])->name('_users.profile.change_password');
    Route::put('/user/update-profile', [UserController::class, 'updateProfile'])->name('_users.profile.update');
    Route::put('/user/update-password', [UserController::class, 'updatePassword'])->name('_users.profile.update_password');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('_admins.home');

    Route::resource('/admin/user', AdminController::class)
        ->names([
            'index'   => '_admins.user.index',
            'create'  => '_admins.user.create',
            'store'   => '_admins.user.store',
            'show'    => '_admins.user.show',
            'edit'    => '_admins.user.edit',
            'update'  => '_admins.user.update',
            'destroy' => '_admins.user.destroy',
        ]);

    // Route untuk profil saya
    Route::get('/admin/my-profile', [AdminController::class, 'myProfile'])->name('_admins.profile.my_profile');
    Route::get('/admin/edit-profile', [AdminController::class, 'editProfile'])->name('_admins.profile.edit_profile');
    Route::get('/admin/change-password', [AdminController::class, 'changePassword'])->name('_admins.profile.change_password');
    Route::put('/admin/update-profile', [AdminController::class, 'updateProfile'])->name('_admins.profile.update');
    Route::put('/admin/update-password', [AdminController::class, 'updatePassword'])->name('_admins.profile.update_password');

});

/*------------------------------------------
--------------------------------------------
All Ketua Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:ketua'])->group(function () {
    Route::get('/ketua/home', [HomeController::class, 'ketuaHome'])->name('_ketuas.home');

    // Route untuk profil saya
    Route::get('/ketua/my-profile', [KetuaController::class, 'myProfile'])->name('_ketuas.profile.my_profile');
    Route::get('/ketua/edit-profile', [KetuaController::class, 'editProfile'])->name('_ketuas.profile.edit_profile');
    Route::get('/ketua/change-password', [KetuaController::class, 'changePassword'])->name('_ketuas.profile.change_password');
    Route::put('/ketua/update-profile', [KetuaController::class, 'updateProfile'])->name('_ketuas.profile.update');
    Route::put('/ketua/update-password', [KetuaController::class, 'updatePassword'])->name('_ketuas.profile.update_password');
});

/*------------------------------------------
--------------------------------------------
All Member Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:member'])->group(function () {
    Route::get('/member/home', [HomeController::class, 'memberHome'])->name('_members.home');

    // Route untuk profil saya
    Route::get('/member/my-profile', [MemberController::class, 'myProfile'])->name('_members.profile.my_profile');
    Route::get('/member/edit-profile', [MemberController::class, 'editProfile'])->name('_members.profile.edit_profile');
    Route::get('/member/change-password', [MemberController::class, 'changePassword'])->name('_members.profile.change_password');
    Route::put('/member/update-profile', [MemberController::class, 'updateProfile'])->name('_members.profile.update');
    Route::put('/member/update-password', [MemberController::class, 'updatePassword'])->name('_members.profile.update_password');
});
