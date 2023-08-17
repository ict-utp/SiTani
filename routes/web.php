<?php

use App\Http\Controllers\ChartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SetLocaleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\DatabaseBackupController;
use App\Http\Controllers\GeneralSettingController;

require __DIR__ . '/auth.php';

Route::get('/', function () {
    return to_route('login');
});

Route::group(['middleware' => ['auth', 'verified']], function () {
    // Dashboards
    Route::resource('dashboard', HomeController::class);
    Route::get('setlocale/{locale}', SetLocaleController::class)->name('setlocale');

    // Promotions
    Route::resource('owners', OwnerController::class)->except('show');
    Route::resource('product-types', ProductTypeController::class)->except('show');

    // User
    Route::resource('users', UserController::class);

    // Permission
    Route::resource('permissions', PermissionController::class)->except(['show']);

    // Roles
    Route::resource('roles', RoleController::class);

    // Profiles
    Route::resource('profiles', ProfileController::class)->only(['index', 'update'])->parameter('profiles', 'user');

    // Env
    Route::singleton('general-settings', GeneralSettingController::class);
    Route::post('general-settings-logo', [GeneralSettingController::class, 'logoUpdate'])->name('general-settings.logo');

    // Database Backup
    Route::resource('database-backups', DatabaseBackupController::class);
    Route::get('database-backups-download/{fileName}', [DatabaseBackupController::class, 'databaseBackupDownload'])->name('database-backups.download');
});
