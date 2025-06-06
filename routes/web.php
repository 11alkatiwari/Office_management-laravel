<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LocationController;
use  App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminAuthController;

Route::get('/', function () {
    return view('welcome');

});
Route::resource('companies', CompanyController::class);
Route::resource('employees', EmployeeController::class);
Route::get('/get-states/{country}', [LocationController::class, 'getStates']);
Route::get('/get-cities/{state}', [LocationController::class, 'getCities']);
Route::get('/employees/hierarchy', [EmployeeController::class, 'hierarchy'])->name('employees.hierarchy');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

