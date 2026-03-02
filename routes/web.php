<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\BankSettingController;
use App\Http\Controllers\MessageTemplateController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\User\DashboardController;

/*
|--------------------------------------------------------------------------
| Public
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

        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        // Customers
        Route::resource('customers', CustomerController::class);

        // Invoices
        Route::resource('invoices', InvoiceController::class);

        // 🔥 Kirim Invoice (ubah status draft -> unpaid)
        Route::patch('invoices/{invoice}/send', [InvoiceController::class, 'send'])
            ->name('invoices.send');

        // 🔥 Kirim WhatsApp Manual
        Route::get('invoices/{invoice}/whatsapp', [InvoiceController::class, 'whatsapp'])
            ->name('invoices.whatsapp');

        // Settings
        Route::prefix('settings')
            ->name('settings.')
            ->group(function () {

                Route::get('/bank', [BankSettingController::class, 'edit'])
                    ->name('bank.edit');

                Route::put('/bank', [BankSettingController::class, 'update'])
                    ->name('bank.update');

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