<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();
// <?php

// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\UserController;
// use App\Http\Controllers\BranchController;
// use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\Adminstator\ItemController;
// use App\Http\Controllers\Adminstator\DashboardController;
// use App\Http\Controllers\PermissionController;
// use App\Http\Controllers\RoleController;

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::controller(DashboardController::class)->name('dashboard.')->group(function () {
//     Route::get('dashboard-index', 'index')->name('index');
// })->middleware(['auth', 'verified'])->name('dashboard');
// Route::controller(ItemController::class)->name('item.')->group(function () {
//     Route::get('item-index', 'index')->name('index');
// });

// ->name('admin.')->
// Route::middleware('admin')->prefix('admin')->group(function () {
//     Route::controller(DashboardController::class)->name('dashboard.')->group(function () {
//         Route::get('dashboard-index', 'index')->name('index');
//     });
//     Route::prefix('branch')->controller(BranchController::class)->name('branch.')->group(function () {
//         Route::get('branch-index', 'index')->name('index');
//         Route::post('store', 'create')->name('store');
//         Route::get('edit-branch', 'edit')->name('edit');
//         Route::get('delete-branch/{id}', 'destroy')->name('delete');
//     });


//     Route::prefix('permission')->controller(PermissionController::class)->name('permission.')->group(function () {
//         Route::get('permissions/{id}', 'permission_user')->name('permission');
//         Route::get('permissions-control', 'permission_control')->name('control');

//     });
//     Route::prefix('user')->controller(UserController::class)->name('user.')->group(function () {

//         Route::get('user-index/{id?}', 'index')->name('index');
//         Route::post('store', 'create')->name('store');
//         Route::get('list', 'list')->name('list');

//         // Route::get('edit-branch/{id}', 'edit')->name('edit');
//         Route::get('delete-branch/{id}', 'destroy')->name('delete');
//     });
//     Route::prefix('role')->controller(RoleController::class)->name('role.')->group(function () {
//         Route::get('role-index', 'index')->name('index');
//         Route::post('store', 'create')->name('store');
//         Route::get('edit-role', 'edit')->name('edit');
//         Route::get('delete-role/{id}', 'destroy')->name('delete');

//     });
//     // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// Route::middleware('auth:web')->group(function () {

// });
// middleware('doctor')->
// Route::middleware('doctor')->prefix('doctor')->name('doctor.')->group(function () {
//     Route::controller(DashboardController::class)->name('dashboard.')->group(function () {
//         Route::get('dashboard-index', 'index')->name('index');
//     });
//     Route::prefix('branch')->controller(BranchController::class)->name('branch.')->group(function () {
//         Route::get('branch-index', 'index')->name('index');
//         Route::post('store', 'create')->name('store');
//         Route::get('edit-branch', 'edit')->name('edit');
//         Route::get('delete-branch/{id}', 'destroy')->name('delete');
//     });


//     Route::prefix('permission')->controller(PermissionController::class)->name('permission.')->group(function () {
//         Route::get('permissions/{id}', 'permission_user')->name('permission');
//         Route::get('permissions-control', 'permission_control')->name('control');

//     });
//     Route::prefix('user')->controller(UserController::class)->name('admin.user.')->group(function () {

//         Route::get('user-index/{id?}', 'index')->name('index');
//         Route::post('store', 'create')->name('store');
//         Route::get('list', 'list')->name('list');

//         // Route::get('edit-branch/{id}', 'edit')->name('edit');
//         Route::get('delete-branch/{id}', 'destroy')->name('delete');
//     });
//     Route::prefix('role')->controller(RoleController::class)->name('role.')->group(function () {
//         Route::get('role-index', 'index')->name('index');
//         Route::post('store', 'create')->name('store');
//         Route::get('edit-role', 'edit')->name('edit');
//         Route::get('delete-role/{id}', 'destroy')->name('delete');

//     });
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__ . '/adminauth.php';

// require __DIR__ . '/doctorauth.php';
