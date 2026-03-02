<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Controllers
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\BankSettingController;
use App\Http\Controllers\MessageTemplateController;
use App\Http\Controllers\Admin\AdminDashboardController;

/*
|--------------------------------------------------------------------------
| Public (Landing Page)
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('pages.landing'); 
})->name('landing');

/*
|--------------------------------------------------------------------------
| Tenant (User Area)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard user
    Route::get('/dashboard', function () {
        return view('pages.dashboard'); 
    })->name('dashboard');

    // Customers
    Route::resource('customers', CustomerController::class);

    // Invoices
    Route::resource('invoices', InvoiceController::class);

    /*
    |--------------------------------------------------------------------------
    | Settings
    |--------------------------------------------------------------------------
    */

    // Bank Setting
    Route::get('/settings/bank', [BankSettingController::class, 'edit'])
        ->name('settings.bank');

    Route::post('/settings/bank', [BankSettingController::class, 'update'])
        ->name('settings.bank.update');

    // Message Template
    Route::get('/settings/template', [MessageTemplateController::class, 'edit'])
        ->name('settings.template');

    Route::post('/settings/template', [MessageTemplateController::class, 'update'])
        ->name('settings.template.update');
});

/*
|--------------------------------------------------------------------------
| Admin Area
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');
    });

/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
