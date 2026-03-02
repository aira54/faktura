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
use App\Http\Controllers\User\DashboardController;


/*
|--------------------------------------------------------------------------
| Public (Landing Page)
|--------------------------------------------------------------------------
*/

Route::view('/', 'pages.landing')->name('landing');


/*
|--------------------------------------------------------------------------
| User Area (Tenant)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])
    ->prefix('app')
    ->name('app.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Dashboard User (WAJIB PAKE CONTROLLER)
        |--------------------------------------------------------------------------
        */

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');


        /*
        |--------------------------------------------------------------------------
        | Customers & Invoices
        |--------------------------------------------------------------------------
        */

        Route::resource('customers', CustomerController::class);
        Route::resource('invoices', InvoiceController::class);


        /*
        |--------------------------------------------------------------------------
        | Settings
        |--------------------------------------------------------------------------
        */

        Route::prefix('settings')
            ->name('settings.')
            ->group(function () {

                // Bank
                Route::get('/bank', [BankSettingController::class, 'edit'])
                    ->name('bank.edit');

                Route::put('/bank', [BankSettingController::class, 'update'])
                    ->name('bank.update');

                // Template
                Route::get('/template', [MessageTemplateController::class, 'edit'])
                    ->name('template.edit');

                Route::put('/template', [MessageTemplateController::class, 'update'])
                    ->name('template.update');
            });
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

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});


require __DIR__.'/auth.php';
