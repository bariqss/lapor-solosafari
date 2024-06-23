<?php

use App\Http\Controllers\user\ReportController as UserReportController;
use Illuminate\Routing\RouteGroup;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/guest', function () {
    return view('guest.index');
});


Route::get('/admin', function () {
    return view('admin.index');
});

Route::get('/view', function () {
    return view('user.laporan.view');
});

Route::get('/operator', function () {
    return view('operator.index');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::prefix('/laporan')->name('laporan.')->group(function () {
    Route::get('/', [UserReportController::class, 'index'])->name('index');
    Route::get('/all', [UserReportController::class, 'home'])->name('home');
    Route::get('/create', [UserReportController::class, 'create'])->name('create');
    Route::post('/create', [UserReportController::class, 'store'])->name('create.post');
    Route::get('/view', [UserReportController::class, 'view'])->name('view');
});
