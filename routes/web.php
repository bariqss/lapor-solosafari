<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\OperatorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\operator\PetugasController;
use App\Http\Controllers\operator\ReportController as OperatorReportController;
use App\Http\Controllers\user\ReportController as UserReportController;
use App\Http\Controllers\PelaporanController;
use App\Http\Controllers\petugas\ReportController as PetugasReportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportCategoryController;
use Illuminate\Support\Facades\Route;

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

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
/*------------------------ Route Admin ------------------------ */

Route::prefix('/admin')->name('admin.')->middleware(['admin', 'verified'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');


    Route::prefix('/manajemen-pelaporan')->name('manajemen-pelaporan.')->group(function () {
        Route::get('/', [PelaporanController::class, 'index'])->name('index');

        Route::prefix('/category')->name('category.')->group(function () {
            Route::post('/create', [ReportCategoryController::class, 'store'])->name('store');
            Route::get('/update/{id}', [ReportCategoryController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [ReportCategoryController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [ReportCategoryController::class, 'destroy'])->name('delete');
        });
    });

    Route::prefix('/manajemen-akun')->name('manajemen-akun.')->group(function () {
        Route::get('/', [OperatorController::class, 'index'])->name('index');
        Route::post('/create', [OperatorController::class, 'store'])->name('store');
        Route::post('/verify', [OperatorController::class, 'verify'])->name('verify');
        Route::post('/resend-email-verification', [OperatorController::class, 'resendVerify'])->name('resend');
        Route::delete('/delete/{id}', [OperatorController::class, 'destroy'])->name('delete');
    });
});
/*------------------------ End Route Admin -------------------- */

/*------------------------ Route Operator -------------------- */
Route::prefix('/operator')->name('operator.')->middleware(['operator', 'verified'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('operator.manajemen-laporan.index');
    })->name('dashboard');

    Route::prefix('/manajemen-laporan')->name('manajemen-laporan.')->group(function () {
        Route::get('/', [OperatorReportController::class, 'index'])->name('index');
        Route::get('/create', [OperatorReportController::class, 'create'])->name('create');
        Route::post('/create', [OperatorReportController::class, 'store'])->name('store');
        Route::get('/view/{id}', [OperatorReportController::class, 'show'])->name('view');
        Route::get('/update/{id}', [OperatorReportController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [OperatorReportController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [OperatorReportController::class, 'destroy'])->name('delete');
    });

    Route::prefix('/manajemen-petugas')->name('manajemen-petugas.')->group(function () {
        Route::get('/', [PetugasController::class, 'index'])->name('index');
        Route::post('/create', [PetugasController::class, 'store'])->name('store');
        Route::post('/verify', [PetugasController::class, 'verify'])->name('verify');
        Route::post('/resend-email-verification', [PetugasController::class, 'resendVerify'])->name('resend');
        Route::delete('/delete/{id}', [PetugasController::class, 'destroy'])->name('delete');
    });
});
/*------------------------ End Route Operator -------------------- */

/*------------------------ Route Petugas -------------------- */
Route::prefix('/petugas')->name('petugas.')->middleware(['petugas', 'verified'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('petugas.laporan.index');
    })->name('dashboard');

    Route::prefix('/laporan')->name('laporan.')->group(function () {
        Route::get('/', [PetugasReportController::class, 'index'])->name('index');
        Route::get('/create', [PetugasReportController::class, 'create'])->name('create');
        Route::post('/create', [PetugasReportController::class, 'store'])->name('store');
        Route::get('/view', [PetugasReportController::class, 'view'])->name('view');
    });

    Route::prefix('/laporan-tertangani')->name('laporan-tertangani.')->group(function () {
        Route::get('/', [PetugasReportController::class, 'riwayat'])->name('riwayat');
    });
});
/*------------------------ End Route Petugas -------------------- */

/*------------------------ Route User -------------------- */
Route::prefix('/user')->name('user.')->middleware(['user', 'verified'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('user.laporan.index');
    })->name('dashboard');

    Route::prefix('/laporan')->name('laporan.')->group(function () {
        Route::get('/', [UserReportController::class, 'index'])->name('index');
        Route::get('/create', [UserReportController::class, 'create'])->name('create');
        Route::post('/create', [UserReportController::class, 'store'])->name('store');
        Route::get('/view/{id}', [UserReportController::class, 'view'])->name('view');
    });

    Route::prefix('/riwayat-laporan')->name('riwayat-laporan.')->group(function () {
        Route::get('/', [UserReportController::class, 'riwayat'])->name('riwayat');
    });
});
/*------------------------ End Route User -------------------- */

Route::prefix('/notifications')->name('notifications.')->group(function () {
    Route::get('/', [NotificationController::class, 'get'])->name('get');
});

Route::get('/', [DashboardController::class, 'index'])->name('index');

// Route::get('/', function () {
//     return view('dashboard');
// });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
