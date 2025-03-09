<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;

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
Route::view('admin', 'dashboard.index')->name('maindashboard');//main doctor and reception dashboard 
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