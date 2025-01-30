<?php

use App\Http\Controllers\Admin\PointController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\DependencyInjection\RegisterControllerArgumentLocatorsPass;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/redeem', [DashboardController::class, 'redeem'])->name('user.redeem');
});

// Admin Panel (Only for Admin)
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin/points', [PointController::class, 'index'])->name('admin.points');
    Route::post('/admin/points/add', [PointController::class, 'addPoints'])->name('admin.points.add');
    Route::get('admin/transactions', [TransactionController::class, 'index'])->name('admin.transactions.index');
    Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard']);
    Route::post('admin/customers', [CustomerController::class, 'store'])->name('admin.customers.store');
    Route::get('/admin/customers', [CustomerController::class, 'index'])->name('admin.customers.index');
    Route::get('/customers/create', [CustomerController::class, 'create'])->name('admin.customers.create');
    Route::get('/customers/{customer}/edit', [CustomerController::class, 'edit'])->name('admin.customers.edit');
    Route::delete('/customers/{customer}', [CustomerController::class, 'destroy'])->name('admin.customers.delete');
});



require __DIR__ . '/auth.php';
