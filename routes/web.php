<?php

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Doctor's Route
Route::prefix('doctor')->group(function () {

    Route::get('/list', [App\Http\Controllers\DoctorController::class, 'index'])->name('doctor.list');
    Route::get('/create', [App\Http\Controllers\DoctorController::class, 'create'])->name('doctor.create');
    Route::post('/store', [App\Http\Controllers\DoctorController::class, 'store'])->name('doctor.store');
    Route::get('/edit/{id}', [App\Http\Controllers\DoctorController::class, 'edit'])->name('doctor.edit');
    Route::post('/update', [App\Http\Controllers\DoctorController::class, 'update'])->name('doctor.update');
    Route::post('/delete', [App\Http\Controllers\DoctorController::class, 'destroy'])->name('doctor.delete');

});

// Patient's Route
Route::prefix('patient')->group(function () {

    Route::get('/list', [App\Http\Controllers\PatientController::class, 'index'])->name('patient.list');
    Route::get('/create', [App\Http\Controllers\PatientController::class, 'create'])->name('patient.create');
    Route::post('/store', [App\Http\Controllers\PatientController::class, 'store'])->name('patient.store');
    Route::get('/edit/{id}', [App\Http\Controllers\PatientController::class, 'edit'])->name('patient.edit');
    Route::post('/update', [App\Http\Controllers\PatientController::class, 'update'])->name('patient.update');
    Route::post('/delete', [App\Http\Controllers\PatientController::class, 'destroy'])->name('patient.delete');

});

// Appointment's Route
Route::prefix('appointment')->group(function () {

    Route::get('/list', [App\Http\Controllers\AppointmentController::class, 'index'])->name('appointment.list');
    Route::get('/create', [App\Http\Controllers\AppointmentController::class, 'create'])->name('appointment.create');
    Route::post('/store', [App\Http\Controllers\AppointmentController::class, 'store'])->name('appointment.store');
    Route::get('/edit/{id}', [App\Http\Controllers\AppointmentController::class, 'edit'])->name('appointment.edit');
    Route::post('/update', [App\Http\Controllers\AppointmentController::class, 'update'])->name('appointment.update');
    Route::post('/delete', [App\Http\Controllers\AppointmentController::class, 'destroy'])->name('appointment.delete');

});