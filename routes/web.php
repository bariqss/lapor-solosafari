<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\operator\ReportController as OperatorReportController;
use App\Http\Controllers\user\ReportController as UserReportController;
use App\Http\Controllers\PelaporanController;
use App\Http\Controllers\PetugasController;
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

/*------------------------ Route Admin ------------------------ */
Route::prefix('/admin')->name('admin.')->middleware(['admin', 'verified'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');


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
        Route::get('/delete/{id}', [OperatorReportController::class, 'destroy'])->name('delete');
    });

    Route::prefix('/manajemen-petugas')->name('manajemen-petugas.')->group(function () {
        Route::get('/', [PetugasController::class, 'index'])->name('index');
    });
});
/*------------------------ End Route Operator -------------------- */


/*------------------------ Route User -------------------- */
Route::prefix('/user')->name('user.')->middleware(['user', 'verified'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('user.laporan.index');
    })->name('dashboard');

    Route::prefix('/laporan')->name('laporan.')->group(function () {
        Route::get('/', [UserReportController::class, 'index'])->name('index');
        Route::get('/create', [UserReportController::class, 'create'])->name('create');
        Route::post('/create', [UserReportController::class, 'store'])->name('create.post');
        Route::get('/view', [UserReportController::class, 'view'])->name('view');
    });

    Route::prefix('/riwayat-laporan')->name('riwayat-laporan.')->group(function () {
        Route::get('/', [UserReportController::class, 'riwayat'])->name('riwayat');
    });
});
/*------------------------ End Route User -------------------- */

Route::get('/', function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
});


// Route::middleware('auth')->group(function () {
//         Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//         Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//         Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//     });
    
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->middleware(['auth', 'verified'])->name('dashboard');

    require __DIR__.'/auth.php';
    