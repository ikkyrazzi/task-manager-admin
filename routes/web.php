<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\AttachmentController;
use App\Http\Controllers\KetuaController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

/*------------------------------------------
--------------------------------------------
All User Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/user/home', [HomeController::class, 'userHome'])->name('_users.home');

    // Manajemen Proyek
    Route::get('/user/projects', [UserProjectController::class, 'index'])->name('_users.projects.index');
    Route::get('/user/projects/{id}', [UserProjectController::class, 'show'])->name('_users.projects.show');

    // Manajemen Tugas
    Route::get('/user/tasks', [UserTaskController::class, 'index'])->name('_users.tasks.index');
    Route::get('/user/tasks/{id}', [UserTaskController::class, 'show'])->name('_users.tasks.show');

    // Manajemen Komentar dan Lampiran
    Route::post('/user/tasks/{id}/comments', [CommentController::class, 'store'])->name('_users.tasks.comments.store');
    Route::post('/user/tasks/{id}/attachments', [AttachmentController::class, 'store'])->name('_users.tasks.attachments.store');

    // Manajemen Notifikasi
    Route::get('/user/notifications', [NotificationController::class, 'index'])->name('_users.notifications.index');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('_admins.home');

    // User Routes
    Route::get('/admin/user', [AdminController::class, 'index'])->name('_admins.user.index');
    Route::get('/admin/user/create', [AdminController::class, 'create'])->name('_admins.user.create');
    Route::post('/admin/user', [AdminController::class, 'store'])->name('_admins.user.store');
    Route::get('/admin/user/{$id}', [AdminController::class, 'show'])->name('_admins.user.show');
    Route::get('/admin/user/{$id}/edit', [AdminController::class, 'edit'])->name('_admins.user.edit');
    Route::put('/admin/user/{$id}', [AdminController::class, 'update'])->name('_admins.user.update');
    Route::delete('/admin/user/{$id}', [AdminController::class, 'destroy'])->name('_admins.user.destroy');

    // Profile Routes
    Route::get('/admin/my-profile', [AdminController::class, 'myProfile'])->name('_admins.profile.my_profile');
    Route::get('/admin/edit-profile', [AdminController::class, 'editProfile'])->name('_admins.profile.edit_profile');
    Route::get('/admin/change-password', [AdminController::class, 'changePassword'])->name('_admins.profile.change_password');
    Route::put('/admin/update-profile', [AdminController::class, 'updateProfile'])->name('_admins.profile.update');
    Route::put('/admin/update-password', [AdminController::class, 'updatePassword'])->name('_admins.profile.update_password');

    // Project Routes_admins
    Route::get('/admin/projects', [ProjectController::class, 'index'])->name('_admins.projects.index');
    Route::get('/admin/projects/create', [ProjectController::class, 'create'])->name('_admins.projects.create');
    Route::post('/admin/projects', [ProjectController::class, 'store'])->name('_admins.projects.store');
    Route::get('/admin/projects/{id}', [ProjectController::class, 'show'])->name('_admins.projects.show');
    Route::get('/admin/projects/{id}/edit', [ProjectController::class, 'edit'])->name('_admins.projects.edit');
    Route::put('/admin/projects/{id}', [ProjectController::class, 'update'])->name('_admins.projects.update');
    Route::delete('/admin/projects/{id}', [ProjectController::class, 'destroy'])->name('_admins.projects.destroy');

    // Task Routes
    Route::get('/admin/tasks', [TaskController::class, 'index'])->name('_admins.tasks.index');
    Route::get('/admin/tasks/create', [TaskController::class, 'create'])->name('_admins.tasks.create');
    Route::post('/admin/tasks', [TaskController::class, 'store'])->name('_admins.tasks.store');
    Route::get('/admin/tasks/{$id}', [TaskController::class, 'show'])->name('_admins.tasks.show');
    Route::get('/admin/tasks/{$id}/edit', [TaskController::class, 'edit'])->name('_admins.tasks.edit');
    Route::put('/admin/tasks/{$id}', [TaskController::class, 'update'])->name('_admins.tasks.update');
    Route::delete('/admin/tasks/{$id}', [TaskController::class, 'destroy'])->name('_admins.tasks.destroy');

    // Notification Routes
    Route::get('/admin/notifications', [NotificationController::class, 'index'])->name('_admins.notifications.index');
    Route::get('/admin/notifications/{$id}', [NotificationController::class, 'show'])->name('_admins.notifications.show');
    Route::delete('/admin/notifications/{$id}', [NotificationController::class, 'destroy'])->name('_admins.notifications.destroy');

    // Comment Routes
    Route::get('/admin/comments', [CommentController::class, 'index'])->name('_admins.comments.index');
    Route::get('/admin/comments/{$id}', [CommentController::class, 'show'])->name('_admins.comments.show');
    Route::delete('/admin/comments/{$id}', [CommentController::class, 'destroy'])->name('_admins.comments.destroy');

    // Attachment Routes
    Route::get('/admin/attachments', [AttachmentController::class, 'index'])->name('_admins.attachments.index');
    Route::get('/admin/attachments/{$id}', [AttachmentController::class, 'show'])->name('_admins.attachments.show');
    Route::delete('/admin/attachments/{$id}', [AttachmentController::class, 'destroy'])->name('_admins.attachments.destroy');
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

    // Route untuk projects
    Route::get('/ketua/projects', [ProjectController::class, 'index'])->name('_ketuas.projects.index');
    Route::get('/ketua/projects/create', [ProjectController::class, 'create'])->name('_ketuas.projects.create');
    Route::post('/ketua/projects', [ProjectController::class, 'store'])->name('_ketuas.projects.store');
    Route::get('/ketua/projects/{id}', [ProjectController::class, 'show'])->name('_ketuas.projects.show');
    Route::get('/ketua/projects/{id}/edit', [ProjectController::class, 'edit'])->name('_ketuas.projects.edit');
    Route::put('/ketua/projects/{id}', [ProjectController::class, 'update'])->name('_ketuas.projects.update');
    Route::delete('/ketua/projects/{id}', [ProjectController::class, 'destroy'])->name('_ketuas.projects.destroy');

    // Route untuk tasks
    Route::get('/ketua/tasks', [TaskController::class, 'index'])->name('_ketuas.tasks.index');
    Route::get('/ketua/tasks/create', [TaskController::class, 'create'])->name('_ketuas.tasks.create');
    Route::post('/ketua/tasks', [TaskController::class, 'store'])->name('_ketuas.tasks.store');
    Route::get('/ketua/tasks/{id}', [TaskController::class, 'show'])->name('_ketuas.tasks.show');
    Route::get('/ketua/tasks/{id}/edit', [TaskController::class, 'edit'])->name('_ketuas.tasks.edit');
    Route::put('/ketua/tasks/{id}', [TaskController::class, 'update'])->name('_ketuas.tasks.update');
    Route::delete('/ketua/tasks/{id}', [TaskController::class, 'destroy'])->name('_ketuas.tasks.destroy');

    // Route untuk notifications
    Route::get('/ketua/notifications', [NotificationController::class, 'index'])->name('_ketuas.notifications.index');

    // Route untuk comments
    Route::get('/ketua/comments', [CommentController::class, 'index'])->name('_ketuas.comments.index');

    // Route untuk attachments
    Route::get('/ketua/attachments', [AttachmentController::class, 'index'])->name('_ketuas.attachments.index');
});


/*------------------------------------------
--------------------------------------------
All Member Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:member'])->group(function () {
    Route::get('/member/home', [HomeController::class, 'memberHome'])->name('_members.home');

    // Manajemen Proyek
    Route::get('/member/projects', [MemberProjectController::class, 'index'])->name('_members.projects.index');
    Route::get('/member/projects/{id}', [MemberProjectController::class, 'show'])->name('_members.projects.show');

    // Manajemen Tugas
    Route::get('/member/tasks', [MemberTaskController::class, 'index'])->name('_members.tasks.index');
    Route::get('/member/tasks/{id}', [MemberTaskController::class, 'show'])->name('_members.tasks.show');
    Route::get('/member/tasks/{id}/edit', [MemberTaskController::class, 'edit'])->name('_members.tasks.edit');
    Route::put('/member/tasks/{id}', [MemberTaskController::class, 'update'])->name('_members.tasks.update');

    // Manajemen Komentar dan Lampiran
    Route::post('/member/tasks/{id}/comments', [CommentController::class, 'store'])->name('_members.tasks.comments.store');
    Route::post('/member/tasks/{id}/attachments', [AttachmentController::class, 'store'])->name('_members.tasks.attachments.store');

    // Manajemen Notifikasi
    Route::get('/member/notifications', [NotificationController::class, 'index'])->name('_members.notifications.index');
});

