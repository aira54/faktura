<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Invoice;
use Carbon\Carbon;

class CheckOverdueInvoices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-overdue-invoices';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
   public function handle()
{
    $today = Carbon::today();

    Invoice::where('status', '!=', 'paid')
           ->where('due_date', '<', $today)
           ->update(['status' => 'overdue']);

    $this->info('Overdue invoices updated successfully.');
}
}
