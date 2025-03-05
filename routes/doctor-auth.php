<?php
// doctor routes
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\Adminstator\DashboardController;
use App\Http\Controllers\Doctor\Auth\RegisteredUserController;
use App\Http\Controllers\Doctor\Auth\AuthenticatedSessionController;
// Appointments related Controller/Group
use App\Http\Controllers\AppointmentsGroup\AppointmentController;
use App\Http\Controllers\AppointmentsGroup\CancelAppointmentController;
use App\Http\Controllers\AppointmentsGroup\PendingAppointmentController;
// Labortary Group controllers
use App\Http\Controllers\LabortaryGroup\TestResultController;

Route::middleware('guest:doctor')->prefix('doctor')->name('doctor.')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

// Route::middleware(['auth:doctor', 'loggedInUser:doctor'])->prefix('doctor')->name('doctor.')->group(function () {
Route::middleware(['auth:doctor'])->prefix('doctor')->name('doctor.')->group(function () {
    Route::prefix('appointment')->name('appointment.')->group(function () {
        Route::controller(AppointmentController::class)->group(function () {
            Route::get('patient-registration/{id?}', 'index')->name('index');
            Route::post('store', 'create')->name('store');
            Route::get('active-appointments', 'list')->name('list');
            Route::get('get-services', 'get_services')->name('get_service');
            // Route::get('getServicesBranch', 'get_services_branch')->name('get_services_branch');
            Route::get('getSearchAppointments', 'get_appointments')->name('get_appointments');
            Route::get('getConsultServices', 'get_consult_services')->name('get_consult_services');
            Route::get('payment-receipt/{id}', 'payment_receipt')->name('payment_receipt');
            Route::get('cancel-appointment/{id}', 'cancel_appointment')->name('cancel_appointment');
            Route::get('getAppointmentPatient', 'getAppointmentPatient')->name('get_app_patient');
        });
        Route::controller(PendingAppointmentController::class)->group(function () {
            Route::get('pending-appointments', 'pending_appointment')->name('pending_appointment');
            Route::get('change-status', 'change_status')->name('change_status');
        });
        Route::controller(CancelAppointmentController::class)->group(function () {
            Route::get('cancel-appointment-list', 'cancel_appointment_list')->name('cancel_appointment_list');
        });
    });
    Route::prefix('patient')->controller(PatientController::class)->name('patients.')->group(function () {
        Route::get('all-patients', 'patients')->name('list');
        Route::get('patient-details/{mr_no}/{id}', 'patient_details')->name('patient_details');
    });
    Route::prefix('labortary')->name('labortary.')->group(function () {
        // TestResulttController
        Route::controller(TestResultController::class)->group(function () {
            Route::get('Test-result-manager', 'test_result_manage')->name('test_result_manage');
            Route::get('Test-result-print/{id}', 'test_result_print')->name('test_result_print');
            Route::get('generate-Test', 'generateTest')->name('generate_test');
            Route::post('request-Test-store', 'requestTestStore')->name('request_test_store');
        });
    });
    Route::controller(DashboardController::class)->name('dashboard.')->group(function () {
        Route::get('dashboard', 'index')->name('index');
    });
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
