<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;

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
// Route::view('/admin/dashboard', 'dashboard.admin')->name('admin.dashboard');
// Route::view('/patient/dashboard', 'dashboard.patient')->name('patient.dashboard');
// Route::view('/doctor/dashboard', 'dashboard.doctor')->name('doctor.dashboard');


Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
// Route::view('/admin/dashboard', 'dashboard.admin')->name('admin.dashboard');
// Route::view('/patient/dashboard', 'dashboard.patient')->name('patient.dashboard');
// Route::view('/doctor/dashboard', 'dashboard.doctor')->name('doctor.dashboard');



Route::get('/redirect', function () {
    return app(RedirectIfAuthenticated::class)->handle(request(), function () {});
})->middleware(['auth']);

Route::get('/home', function () {
    if (Auth::check()) {
        return redirect('/redirect'); // redirect based on the role
    }
    return redirect('/login'); // redirect to the login page if it's no logned
});



Route::get('auth/google/callback', [SocialiteController::class, 'googleCallback'])->name('auth.google.callback');
Route::get('auth/google', [SocialiteController::class, 'googleLogin'])->name('auth.google');


Route::get('forgot-password', [ForgotPasswordController::class, 'forgotPasswordForm'])
    ->name('password.forgot');
    
Route::post('forgot-password', [ForgotPasswordController::class, 'forgotPasswordFormPost'])
    ->name('password.forgot.post');

// Reset Password Routes
Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])
    ->name('password.reset');
    
Route::post('reset-password', [ResetPasswordController::class, 'reset'])
    ->name('password.update');


    



// fkdjgfgg

// Route::middleware('role:Admin')->group(function () {
//     Route::view('doctors', 'admin.doctors.index')->name('doctors');
// });
// Route::view('doctors', 'admin.doctors.index')->name('doctors');//  list doctors dashboard
Route::middleware(['role:admin'])->group(function () {
    Route::view('doctors', 'admin.doctors.index')->name('doctors');
});


Route::view('show', 'admin.doctors.show')->name('doctor.show');//  show doctor details
Route::view('edit', 'admin.doctors.edit')->name('doctor.edit');//  edit doctor details
Route::view('create/doctor', 'admin.doctors.create')->name('create.doctor');//  screate a doctor

    //manage patient
Route::view('patients', 'admin.patients.index')->name('patients-list');
Route::view('patients/show', 'admin.patients.show')->name('patient.show');
Route::view('patients/edit', 'admin.patients.edit')->name('patient.edit');
Route::view('patients/create', 'admin.patients.create')->name('patient.create');
    //stuffs
Route::view('stuffs', 'admin.stuffs.index')->name('stuffs');
Route::view('stuffs/create', 'admin.stuffs.create')->name('stuff.create');
Route::view('stuffs/edit', 'admin.stuffs.edit')->name('stuff.edit');
Route::view('stuffs/show', 'admin.stuffs.show')->name('stuff.show');

Route::view('patients/billing', 'admin.billings.show')->name('patientbillingshow');

    //appointemtns
Route::view('patients/appointments', 'admin.appointments.index')->name('appointments-list');

Route::view('patients/appointments/create', 'admin.appointments.create')->name('appointment.create');

Route::view('patients/appointments/show', 'admin.appointments.show')->name('appointment.show');

Route::view('patients/appointments/edit', 'admin.appointments.edit')->name('appointment.edit');

    //recordes
Route::view('patient-recordes-list', 'admin.patient-recordes.index')->name('recordes.index');







Route::middleware([RoleMiddleware::class . ':admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::middleware([RoleMiddleware::class . ':patient'])->group(function () {
    Route::get('/patient', [UserController::class, 'index'])->name('patient.dashboard');
});
// Route::middleware([RoleMiddleware::class . ':User'])->group(function () {
//     Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
// });
