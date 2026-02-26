<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Invoice;
use Carbon\Carbon;

class SendScheduledInvoices extends Command
{
   protected $signature = 'invoices:send-scheduled';
    protected $description = 'Send invoices automatically on target date';

    public function handle()
    {
        $today = Carbon::today();

        $invoices = Invoice::whereDate('send_at', $today)
            ->where('is_sent', false)
            ->with(['customer', 'business.bankSetting', 'business.messageTemplate'])
            ->get();

        foreach ($invoices as $invoice) {

            if (!$invoice->business->bankSetting?->auto_send_invoice) {
                continue;
            }

            $template = $invoice->business->messageTemplate?->template;

            if (!$template) continue;

            $message = str_replace(
                [
                    '[NAMA_PELANGGAN]',
                    '[ID_INVOICE]',
                    '[TOTAL]',
                    '[NAMA_BANK]',
                    '[NO_REKENING]',
                    '[NAMA_PEMEGANG]',
                ],
                [
                    $invoice->customer->name,
                    $invoice->invoice_number,
                    number_format($invoice->total_amount),
                    $invoice->business->bankSetting->bank_name,
                    $invoice->business->bankSetting->account_number,
                    $invoice->business->bankSetting->account_holder,
                ],
                $template
            );

            // 🔹 Di sini integrasikan ke WhatsApp API kamu
            // sendWhatsApp($invoice->customer->phone, $message);

            $invoice->update(['is_sent' => true]);
        }

        $this->info('Scheduled invoices processed.');
    }
}