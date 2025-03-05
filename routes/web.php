<?php
//  patient routes
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Adminstator\DashboardController;
use App\Http\Controllers\LabortaryGroup\TestResultController;

Route::get('/', function () {
    return view('welcome');
})->name('home');


// Route::prefix('patient')->group(function () {
//     Route::middleware(['auth', 'loggedInUser:labortarist'])->group(function () {
//         Route::controller(DashboardController::class)->name('dashboard.')->group(function () {
//             Route::get('dashboard', 'index')->name('index');
//         });
//         Route::name('patient.')->group(function () {

//             Route::prefix('labortary')->name('labortary.')->group(function () {
//                 // TestResulttController
//                 Route::controller(TestResultController::class)->group(function () {
//                     Route::get('Test-result-manager', 'test_result_manage')->name('test_result_manage');
//                     Route::get('Test-result-print/{id}', 'test_result_print')->name('test_result_print');
//                     Route::get('generate-Test', 'generateTest')->name('generate_test');
//                     Route::post('request-Test-store', 'requestTestStore')->name('request_test_store');
//                 });
//             });
//         });
//     });
// });

require __DIR__ . '/auth.php';
    require __DIR__ . '/admin-auth.php';
require __DIR__ . '/doctor-auth.php';
require __DIR__ . '/receptionist-auth.php';
require __DIR__ . '/labortarist-auth.php';
