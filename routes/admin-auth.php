<?php
// admin/super admin routes
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\Admin\AdminController;
// Labortary Group controllers
use App\Http\Controllers\LabortaryGroup\LabortaryController;
use App\Http\Controllers\LabortaryGroup\CancelPatientTestController;
use App\Http\Controllers\LabortaryGroup\TestResultController;
use App\Http\Controllers\LabortaryGroup\PatientTestListController;
// extra controller with extra auth if usable in future
use App\Http\Controllers\LabortaristController;
// Receptionist Controller
use App\Http\Controllers\ReceptionistController;
// Appointments related Controller/Group
use App\Http\Controllers\AppointmentsGroup\AppointmentController;
use App\Http\Controllers\AppointmentsGroup\CancelAppointmentController;
use App\Http\Controllers\AppointmentsGroup\PendingAppointmentController;
// DashboardController
use App\Http\Controllers\Adminstator\DashboardController;
// AuthienticationControllers
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\PatientController;

Route::middleware('guest:admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware(['auth:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::controller(DashboardController::class)->name('dashboard.')->group(function () {
        Route::get('dashboard', 'index')->name('index');
    });
});
Route::middleware(['auth:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::prefix('profile')->controller(ProfileController::class)->name('profile.')->group(function () {
        Route::get('profile', 'working_page')->name('working_page');
        Route::get('profile', 'show_profile')->name('profile');
        Route::get('account-setting', 'edit_profile')->name('edit_profile');
    });
    Route::prefix('patient')->controller(PatientController::class)->name('patients.')->group(function () {
        Route::get('all-patients', 'patients')->name('list');
        Route::get('patient-details/{mr_no}/{id}', 'patient_details')->name('patient_details');
    });
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
    Route::prefix('user')->controller(UserController::class)->name('user.')->group(function () {
        Route::get('user-index/{id?}', 'index')->name('index');
        Route::post('store', 'create')->name('store');
        Route::get('list', 'list')->name('list');
        Route::get('delete-branch/{id}', 'destroy')->name('delete');
    });
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

    Route::prefix('admin')->controller(AdminController::class)->name('admin.')->group(function () {
        Route::get('admin-index/{id?}', 'index')->name('index');
        Route::post('store', 'create')->name('store');
        Route::get('list', 'list')->name('list');
        Route::get('delete/{id}', 'destroy')->name('delete');
    });
    Route::prefix('receptionist')->controller(ReceptionistController::class)->name('receptionist.')->group(function () {
        Route::get('receptionist/{id?}', 'index')->name('index');
        Route::post('store', 'create')->name('store');
        Route::get('list', 'list')->name('list');
        Route::get('delete/{id}', 'destroy')->name('delete');
    });
    Route::prefix('labortarist')->controller(LabortaristController::class)->name('labortarist.')->group(function () {
        Route::get('labortarist/{id?}', 'index')->name('index');
        Route::post('store', 'create')->name('store');
        Route::get('list', 'list')->name('list');
        Route::get('delete/{id}', 'destroy')->name('delete');
    });
    Route::prefix('doctor')->controller(DoctorController::class)->name('doctor.')->group(function () {
        Route::get('doctor-index/{id?}', 'index')->name('index');
        Route::post('store', 'create')->name('store');
        Route::get('edit-branch', 'edit')->name('edit');
        // Route::get('delete/{id}', 'destroy')->name('delete');
        Route::get('list', 'list')->name('list');
    });
    Route::prefix('branch')->controller(BranchController::class)->name('branch.')->group(function () {
        Route::get('branch-index', 'index')->name('index');
        Route::post('store', 'create')->name('store');
        Route::get('edit-branch', 'edit')->name('edit');
        Route::get('delete-branch/{id}', 'destroy')->name('delete');
    });


    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
