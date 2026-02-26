<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     */
    protected $commands = [
        \App\Console\Commands\CheckOverdueInvoices::class,
        \App\Console\Commands\SendScheduledInvoices::class,
    ];

    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // Update invoice overdue status setiap hari
        $schedule->command('invoices:check-overdue')
                 ->daily()
                 ->withoutOverlapping();

        // Kirim invoice otomatis sesuai tanggal target
        $schedule->command('invoices:send-scheduled')
                 ->daily()
                 ->withoutOverlapping();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}