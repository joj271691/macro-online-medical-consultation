<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DoctorController;
use App\Models\patients;

Route::get('/', function () {
    return view('home.index');
});
Route::get("/",[HomeController::class,'index']);

Route::get("/home",[AdminController::class,'index']);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
//Admin
// Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
//Admin for patient
Route::get('/patient_managment',[AdminController::class, 'patientlist'])->name('admin.patient_managment.patient_list');
Route::post('/add_patient',[AdminController::class, 'addpatient']);
Route::get('/edit_patient/{id}',[AdminController::class, 'editpatient']);
Route::post('/update_patient/{id}',[AdminController::class, 'updatepatient']);
Route::get('/delete_patient/{id}',[AdminController::class, 'deletepatient']);
//Admin for Doc
Route::get('/doctor_managment',[AdminController::class, 'doctorlist'])->name('admin.doctor_managment.doctor_list');
Route::post('/add_doctor',[AdminController::class, 'adddoctor']);
Route::get('/edit_doctor/{id}',[AdminController::class, 'editdoctor']);
Route::post('/update_doctor/{id}',[AdminController::class, 'updatedoctor']);
Route::get('/delete_doctor/{id}',[AdminController::class, 'deletedoctor']);
// });

//Doctor
// Doctor Dashboard Route
Route::prefix('doctor')->middleware(['auth', 'role:doctor'])->name('doctor.')->group(function () {
    Route::get('/home', [DoctorController::class, 'dashboard'])->name('dashboard');
    Route::get('/appointments', [DoctorController::class, 'appointments'])->name('doctor.appointments');
});

