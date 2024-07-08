<?php

use App\Http\Controllers\LocationController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\operator\ReportController as OperatorReportController;
use App\Http\Controllers\PelaporanController;
use App\Http\Controllers\ReportCategoryController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\user\ReportController as UserReportController;
use App\Models\Report;
use App\Models\ReportCategory;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Constraint\Operator;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/admin', function () {
    return view('admin.index');
});

Route::prefix('/manajemen-pelaporan')->name('manajemen-pelaporan.')->group(function () {
    Route::get('/', [PelaporanController::class, 'index'])->name('index');

    Route::prefix('/category')->name('category.')->group(function () {
        Route::post('/create', [ReportCategoryController::class, 'store'])->name('store');
        Route::post('/update/{id}', [ReportCategoryController::class, 'update'])->name('update');
        Route::get('/update/{id}', [ReportCategoryController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [ReportCategoryController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [ReportCategoryController::class, 'destroy'])->name('delete');
    });
});

Route::prefix('/manajemen-role')->name('manajemen-role.')->group(function () {
    Route::get('/', [RoleController::class, 'index'])->name('index');
    Route::get('/view', [RoleController::class, 'index'])->name('index');
});

Route::prefix('/manajemen-laporan')->name('manajemen-laporan.')->group(function () {
    Route::get('/', [OperatorReportController::class, 'index'])->name('index');
    Route::get('/update/{id}', [OperatorReportController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [OperatorReportController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [OperatorReportController::class, 'destroy'])->name('delete');
});

Route::prefix('/manajemen-petugas')->name('manajemen-petugas.')->group(function () {
    Route::get('/', [PetugasController::class, 'index'])->name('index');
    Route::put('/create', [PetugasController::class, 'store'])->name('create.post');
    Route::get('/view/{id}', [PetugasController::class, 'store'])->name('view');
    Route::get('/delete/{id}', [PetugasController::class, 'destroy'])->name('delete');
});

Route::prefix('/laporan')->name('laporan.')->group(function () {
    Route::get('/', [UserReportController::class, 'index'])->name('index');
    Route::get('/riwayat', [UserReportController::class, 'riwayat'])->name('riwayat');
    Route::get('/create', [UserReportController::class, 'create'])->name('create');
    Route::post('/create', [UserReportController::class, 'store'])->name('create.post');
    Route::get('/view/{id}', [UserReportController::class, 'show'])->name('view');
});