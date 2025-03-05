<?php

// labortarist routes
// Extra auth if usable in future
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\Adminstator\DashboardController;
use App\Http\Controllers\LabortaryGroup\LabortaryController;
use App\Http\Controllers\LabortaryGroup\TestResultController;
use App\Http\Controllers\LabortaryGroup\PatientTestListController;
use App\Http\Controllers\labortarist\Auth\RegisteredUserController;
use App\Http\Controllers\LabortaryGroup\CancelPatientTestController;
use App\Http\Controllers\labortarist\Auth\AuthenticatedSessionController;
// use App\Http\Controllers\Receptionist\Auth\RegisteredUserController;
// use App\Http\Controllers\Receptionist\Auth\AuthenticatedSessionController;


Route::middleware('guest:labortarist')->prefix('labortarist')->name('labortarist.')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth:labortarist')->prefix('labortarist')->name('labortarist.')->group(function () {
    Route::prefix('labortary')->name('labortary.')->group(function () {
        Route::controller(LabortaryController::class)->group(function () {
            Route::get('labortary/{id?}', 'index')->name('index');
            Route::post('store', 'create')->name('store');
            Route::get('list', 'list')->name('list');
            Route::get('delete/{id}', 'destroy')->name('delete');
        });
        // TestResulttController
        Route::controller(TestResultController::class)->group(function () {
            Route::get('Test-result-manager', 'test_result_manage')->name('test_result_manage');
            Route::get('Test-result-print/{id}', 'test_result_print')->name('test_result_print');
            Route::get('generate-Test', 'generateTest')->name('generate_test');
            Route::post('request-Test-store', 'requestTestStore')->name('request_test_store');
            // admin.labortary.requestTestStore
        });
        Route::controller(PatientTestListController::class)->group(function () {
            Route::get('Patient-Test-List', 'patient_test')->name('patient_test');
            Route::get('Patient-Test-Edit/{id}', 'patientTestEdit')->name('patient_test_edit');
            Route::get('Patient-Test-cancel/{id}', 'patientTestCancel')->name('patient_test_cancel');
            Route::get('payment-receipt/{id}', 'patientPaymentReceipt')->name('patient_payment_receipt');
            Route::get('Test-Search', 'get_labappointment')->name('get_labappointment');
        });
        Route::controller(CancelPatientTestController::class)->group(function () {
            Route::get('Cancel-Patient-Test-List', 'cancel_patient_test')->name('cancel_patient_test');
        });
    });
    Route::prefix('user')->controller(UserController::class)->name('user.')->group(function () {

        Route::get('user-index/{id?}', 'index')->name('index');
        Route::post('store', 'create')->name('store');
        Route::get('list', 'list')->name('list');

        Route::get('delete-branch/{id}', 'destroy')->name('delete');
    });
    // });
    Route::controller(DashboardController::class)->name('dashboard.')->group(function () {
        Route::get('dashboard', 'index')->name('index');
    });

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
