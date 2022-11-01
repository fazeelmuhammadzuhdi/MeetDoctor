<?php

use App\Http\Controllers\Backsite\DashboardController;
use App\Http\Controllers\Frontsite\AppointmentController;
use App\Http\Controllers\Frontsite\LandingController;
use App\Http\Controllers\Frontsite\PaymentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('/', LandingController::class);

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {



    // appointment page
    // Route::get('appointment/doctor/{id}', [AppointmentController::class, 'appointment'])->name('appointment.doctor');
    Route::resource('appointment', AppointmentController::class);

    // // payment page
    // Route::get('payment/success', [PaymentController::class, 'success'])->name('payment.success');
    // Route::get('payment/appointment/{id}', [PaymentController::class, 'payment'])->name('payment.appointment');
    Route::resource('payment', PaymentController::class);

    // Route::resource('register_success', RegisterController::class);
});

Route::group(['prefix' => 'backsite', 'as' => 'backsite.', 'middleware' => ['auth:sanctum', 'verified']], function () {

    // dashboard
    Route::resource('dashboard', DashboardController::class);

    // // permission
    // Route::resource('permission', PermissionController::class);

    // // role
    // Route::resource('role', RoleController::class);

    // // user
    // Route::resource('user', UserController::class);

    // // type user
    // Route::resource('type_user', TypeUserController::class);

    // // specialits
    // Route::resource('specialist', SpecialistController::class);

    // // config payment
    // Route::resource('config_payment', ConfigPaymentController::class);

    // // consultation
    // Route::resource('consultation', ConsultationController::class);

    // // doctor
    // Route::resource('doctor', DoctorController::class);

    // // hospital patient
    // Route::resource('hospital_patient', HospitalPatientController::class);

    // // report appointment
    // Route::resource('appointment', ReportAppointmentController::class);

    // // report transaction
    // Route::resource('transaction', ReportTransactionController::class);
});


// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
