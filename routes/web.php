<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SocialiteController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

// Route::resource('formations', FormationController::class);
//auth

//register
Route::get('register', [RegisterController::class, 'create'])->name('register.create');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
//login
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
//logout
Route::post('/logout', function () {
    Auth::logout();  // Log the user out
    return redirect('/login');  // Redirect to login page
})->name('logout');

// Route::post('/register', [RegisterController::class, 'register'])->name('register');
// admin dashboard
    //manage doctors

// Route::middleware(['auth', 'role:admin'])->get('/admin/dashboard', [AdminController::class, 'dashboard']);
// Route::middleware(['auth', 'role:doctor'])->get('/doctor/dashboard', [DoctorController::class, 'dashboard']);
// Route::middleware(['auth', 'role:patient'])->get('/patient/dashboard', [PatientController::class, 'dashboard']);
// Route::view('/admin/dashboard', [DashboardController::class, 'dashboard']);
Route::view('/admin/dashboard', 'dashboard.admin')->name('admin.dashboard');
Route::view('/patient/dashboard', 'dashboard.patient')->name('patient.dashboard');
Route::view('/doctor/dashboard', 'dashboard.doctor')->name('doctor.dashboard');
Route::get('auth/google/callback', [SocialiteController::class, 'googleCallback'])->name('auth.google.callback');
Route::get('auth/google', [SocialiteController::class, 'googleLogin'])->name('auth.google');

// //forgot password
// Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
// // Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
// Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// // Reset Password Route
// Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
// Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');


Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::view('doctors', 'admin.doctors.index')->name('doctors');//  patient dashboard
Route::view('show', 'admin.doctors.show')->name('show');//  show doctor details
Route::view('edit', 'admin.doctors.edit')->name('edit');//  edit doctor details
Route::view('create/doctor', 'admin.doctors.create')->name('edit');//  show doctor details
    //manage patient
Route::view('patients', 'admin.patients.index')->name('patients-list');
Route::view('patients/show', 'admin.patients.show')->name('patientshow');
Route::view('patients/edit', 'admin.patients.edit')->name('patientedit');
Route::view('patients/create', 'admin.patients.create')->name('patientecretae');

Route::view('patients/billing', 'admin.billings.show')->name('patientbillingshow');

Route::view('patients/appointments/create', 'admin.appointments.create')->name('appointments-list');