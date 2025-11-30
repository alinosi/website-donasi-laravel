<?php

use App\Http\Controllers\DonaturController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\cekAdmin;
use App\Http\Middleware\cekLogin;

Route::get('/', function () {
    return view('index');
});

Route::get('/donasi', [DonaturController::class, 'donasi'])->name('donasi');
Route::get('/donatur', [DonaturController::class, 'tampildonatur']);

Route::middleware([cekLogin::class])->group(function () {
    Route::get('/pembayaran/{id}', [DonaturController::class, 'create'])->name('pembayaran');
    Route::post('/pembayaran/store', [TransactionController::class, 'store'])->name('transaction.store');
});

Route::resource('donaturs', DonaturController::class);

Route::middleware([cekAdmin::class])->group(function () {
    Route::get('/dashboard', [DonaturController::class, 'index']);
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    // URL: /admin/users -> Route Name: admin.users.index
    Route::resource('users', UserController::class)->name('index', 'admin.users.index');

    // URL: /admin/programs
    // Route::get('/programs', ProgramController::class)->name('index', 'admin.programs.index');
    Route::get('/programs', [ProgramController::class, 'index'])->name('admin.programs.index');
    Route::get('/programs/create', [ProgramController::class, 'create'])->name('admin.programs.create');
    Route::post('/programs/create', [ProgramController::class, 'store'])->name('admin.programs.store');
    Route::patch('/programs/{id}', [ProgramController::class, 'deactivate'])->name('admin.programs.deactivate');


    // URL: /admin/transactions
    Route::resource('transactions', TransactionController::class)->name('index', 'admin.transactions.index');
});

// SESI LOGIN
Route::get('/session', [SessionController::class, 'index']);
Route::post('/session/login', [SessionController::class, 'login']);

Route::get('/session/register', [SessionController::class, 'register']);
Route::post('/session/create', [SessionController::class, 'create']);

Route::get('/session/logout', [SessionController::class, 'logout']);
