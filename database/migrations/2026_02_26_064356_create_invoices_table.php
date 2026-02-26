<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();

            $table->foreignId('business_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->foreignId('customer_id')
                  ->constrained()
                  ->cascadeOnDelete();

           $table->string('invoice_number');
            $table->date('issue_date');
            $table->date('due_date');

            $table->decimal('total_amount', 15, 2)->default(0);

            $table->enum('status', [
                'draft',
                'sent',
                'paid',
                'overdue'
            ])->default('draft');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
