<?php

use App\Events\MyEvent;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\RayEmployeesLoginController;
use App\Http\Controllers\Dashboard\AmbulanceController;
use App\Http\Controllers\Dashboard\AppointmentController;
use App\Http\Controllers\Dashboard\DoctorController;
use App\Http\Controllers\Dashboard\DriverController;
use App\Http\Controllers\Dashboard\InsuranceController;
use App\Http\Controllers\Dashboard\LabEmployeeController;
use App\Http\Controllers\Dashboard\PatientController;
use App\Http\Controllers\Dashboard\PaymentAccountController;
use App\Http\Controllers\Dashboard\RayEmployeeController;
use App\Http\Controllers\Dashboard\ReceiptAccountController;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\Dashboard\ServiceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// ========     Admins Route : ( Only Guard Admin Can Access this route ) ===========
// Route::middleware(['auth:admin', 'verified'])->group(function () {
    // go to dashboard admin

//     Route::get('Dashboard.Admin.index', [AdminController::class, 'index'])->name('dashboard');

//     // ===== Start Section Controller Route =======
//     Route::prefix('section')->group(function () {
//         Route::get('index', [SectionController::class, 'index'])->name('section.index');
//         Route::post('store', [SectionController::class, 'store'])->name('section.store');
//         Route::post('update/{id}', [SectionController::class, 'update'])->name('section.update');
//         Route::post('destroy/{id}', [SectionController::class, 'destroy'])->name('section.destroy');
//     });
//     // ===== End Section Controller Route =======

//     // ===== Start Doctor Controller Route =======
//     Route::prefix('doctor')->group(function () {
//         Route::get('index', [DoctorController::class, 'index'])->name('doctor.index');
//         Route::get('create', [DoctorController::class, 'create'])->name('doctor.create');
//         Route::post('store', [DoctorController::class, 'store'])->name('doctor.store');
//         Route::get('edit/{id}', [DoctorController::class, 'edit'])->name('doctor.edit');
//         Route::post('update/{id}', [DoctorController::class, 'update'])->name('doctor.update');
//         Route::post('updatePassword/{id}', [DoctorController::class, 'updatePassword'])->name('doctor.updatePassword');
//         Route::post('destroy/{id}', [DoctorController::class, 'destroy'])->name('doctor.destroy');
//     });
//     // ===== End Doctor Controller Route =======

//     // ===== Start Services Controller Route =======
//     Route::prefix('service')->group(function () {
//         Route::get('index', [ServiceController::class, 'index'])->name('service.index');
//         Route::post('store', [ServiceController::class, 'store'])->name('service.store');
//         Route::post('update/{id}', [ServiceController::class, 'update'])->name('service.update');
//         Route::post('destroy/{id}', [ServiceController::class, 'destroy'])->name('service.destroy');
//     });
//     // ===== End Services Controller Route =======

//     // ===== Start ServicesOffered Component Livewire Route =======
//     Route::view('ServicesOffered/layout', 'livewire.servicesOffered.layout')->name('servicesOffered.layout');
//     // ===== End ServicesOffered Component Livewire Route =======

//     // ===== Start insurances Controller Route =======
//     Route::prefix('insurance')->group(function () {
//         Route::get('index', [InsuranceController::class, 'index'])->name('insurance.index');
//         Route::get('create', [InsuranceController::class, 'create'])->name('insurance.create');
//         Route::post('store', [InsuranceController::class, 'store'])->name('insurance.store');
//         Route::get('edit/{id}', [InsuranceController::class, 'edit'])->name('insurance.edit');
//         Route::post('update/{id}', [InsuranceController::class, 'update'])->name('insurance.update');
//         Route::post('destroy/{id}', [InsuranceController::class, 'destroy'])->name('insurance.destroy');
//     });
//     // ===== End insurances Controller Route =======

//     // ===== Start Ambulances Controller Route =======
//     Route::prefix('ambulance')->group(function () {
//         Route::get('index', [AmbulanceController::class, 'index'])->name('ambulance.index');
//         Route::get('create', [AmbulanceController::class, 'create'])->name('ambulance.create');
//         Route::post('store', [AmbulanceController::class, 'store'])->name('ambulance.store');
//         Route::get('edit/{id}', [AmbulanceController::class, 'edit'])->name('ambulance.edit');
//         Route::post('update/{id}', [AmbulanceController::class, 'update'])->name('ambulance.update');
//         Route::post('destroy/{id}', [AmbulanceController::class, 'destroy'])->name('ambulance.destroy');
//     });
//     // ===== End Ambulances Controller Route =======

//     // ===== Start drivers Controller Route =======
//     Route::prefix('driver')->group(function () {
//         Route::get('index', [DriverController::class, 'index'])->name('driver.index');
//         Route::get('create', [DriverController::class, 'create'])->name('driver.create');
//         Route::post('store', [DriverController::class, 'store'])->name('driver.store');
//         Route::get('edit/{id}', [DriverController::class, 'edit'])->name('driver.edit');
//         Route::post('update/{id}', [DriverController::class, 'update'])->name('driver.update');
//         Route::post('destroy/{id}', [DriverController::class, 'destroy'])->name('driver.destroy');
//     });
//     // ===== End drivers Controller Route =======

//     // ===== Start Patient Controller Route =======
//     Route::prefix('patient')->group(function () {
//         Route::get('index', [PatientController::class, 'index'])->name('patient.index');
//         Route::get('create', [PatientController::class, 'create'])->name('patient.create');
//         Route::post('store', [PatientController::class, 'store'])->name('patient.store');
//         Route::get('show/{id}', [PatientController::class, 'show'])->name('patient.show');
//         Route::get('edit/{id}', [PatientController::class, 'edit'])->name('patient.edit');
//         Route::post('update/{id}', [PatientController::class, 'update'])->name('patient.update');
//         Route::post('destroy/{id}', [PatientController::class, 'destroy'])->name('patient.destroy');
//     });
//     // ===== End patient Controller Route =======

//     // ===== Start ServicesOffered Component Livewire Route =======
//     Route::prefix('singleInvoices')->group(function () {
//         Route::view('index', 'livewire.singleInvoices.index')->name('singleInvoices.index');
//         Route::view('print', 'livewire.singleInvoices.print')->name('singleInvoices.print');
//     });

//     // ===== End ServicesOffered Component Livewire Route =======

//     // ===== Start receiptAccount Controller Route =======
//     Route::prefix('receiptAccount')->group(function () {
//         Route::get('index', [ReceiptAccountController::class, 'index'])->name('receiptAccount.index');
//         Route::get('create', [ReceiptAccountController::class, 'create'])->name('receiptAccount.create');
//         Route::post('store', [ReceiptAccountController::class, 'store'])->name('receiptAccount.store');
//         Route::get('show/{id}', [ReceiptAccountController::class, 'show'])->name('receiptAccount.show');
//         Route::get('edit/{id}', [ReceiptAccountController::class, 'edit'])->name('receiptAccount.edit');
//         Route::post('update/{id}', [ReceiptAccountController::class, 'update'])->name('receiptAccount.update');
//         Route::post('destroy/{id}', [ReceiptAccountController::class, 'destroy'])->name('receiptAccount.destroy');
//     });
//     // ===== End ReceiptAccount Controller Route =======

//     // ===== Start Payment Account Controller Route =======
//     Route::prefix('paymentAccount')->group(function () {
//         Route::get('index', [PaymentAccountController::class, 'index'])->name('paymentAccount.index');
//         Route::get('create', [PaymentAccountController::class, 'create'])->name('paymentAccount.create');
//         Route::post('store', [PaymentAccountController::class, 'store'])->name('paymentAccount.store');
//         Route::get('show/{id}', [PaymentAccountController::class, 'show'])->name('paymentAccount.show');
//         Route::get('edit/{id}', [PaymentAccountController::class, 'edit'])->name('paymentAccount.edit');
//         Route::post('update/{id}', [PaymentAccountController::class, 'update'])->name('paymentAccount.update');
//         Route::post('destroy/{id}', [PaymentAccountController::class, 'destroy'])->name('paymentAccount.destroy');
//     });
//     // ===== End Payment Account Controller Route =======

//     // ===== Start groupInvoices Component Livewire Route =======
//     Route::prefix('groupInvoices')->group(function () {
//         Route::view('index', 'livewire.groupInvoices.index')->name('groupInvoices.index');
//         Route::view('print', 'livewire.groupInvoices.print')->name('groupInvoices.print');
//         // ===== End groupInvoices Component Livewire Route =======
//     });

//     // ===== Start ray_employee Controller Route =======
//     Route::prefix('ray_employee')->group(function () {
//         Route::get('index', [RayEmployeeController::class, 'index'])->name('ray_employee.index');
//         Route::get('create', [RayEmployeeController::class, 'create'])->name('ray_employee.create');
//         Route::post('store', [RayEmployeeController::class, 'store'])->name('ray_employee.store');
//         Route::get('edit/{id}', [RayEmployeeController::class, 'edit'])->name('ray_employee.edit');
//         Route::post('update/{id}', [RayEmployeeController::class, 'update'])->name('ray_employee.update');
//         Route::post('destroy/{id}', [RayEmployeeController::class, 'destroy'])->name('ray_employee.destroy');
//     });
//     // ===== End ray_employee Controller Route =======

//     // ===== Start lab_employee Controller Route =======
//     Route::prefix('lab_employee')->group(function () {
//         Route::get('index', [LabEmployeeController::class, 'index'])->name('lab_employee.index');
//         Route::get('create', [LabEmployeeController::class, 'create'])->name('lab_employee.create');
//         Route::post('store', [LabEmployeeController::class, 'store'])->name('lab_employee.store');
//         Route::get('edit/{id}', [LabEmployeeController::class, 'edit'])->name('lab_employee.edit');
//         Route::post('update/{id}', [LabEmployeeController::class, 'update'])->name('lab_employee.update');
//         Route::post('destroy/{id}', [LabEmployeeController::class, 'destroy'])->name('lab_employee.destroy');
//     });
//     // ===== End lab_employee Controller Route =======

//     // ===== Start Appointment Controller Route =======
//     Route::prefix('Appointment')->group(function () {
//         Route::get('notConfirmed', [AppointmentController::class, 'notConfirmed'])->name('appointment.notConfirmed');
//         Route::get('confirmed', [AppointmentController::class, 'confirmed'])->name('appointment.confirmed');
//         Route::get('finished', [AppointmentController::class, 'finished'])->name('appointment.finished');
//         Route::post('update/{id}', [AppointmentController::class, 'update'])->name('appointment.update');
//         Route::post('destroy/{id}', [AppointmentController::class, 'destroy'])->name('appointment.destroy');

//     });
//     // ===== End Appointment Controller Route =======
// });



require __DIR__ . '/auth.php';
