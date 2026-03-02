<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class Invoice extends Model
{
    protected $fillable = [
        'business_id',
        'customer_id',
        'invoice_number',
        'issue_date',
        'due_date',
        'total_amount',
        'status'
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }


    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

   public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }

    public function getComputedStatusAttribute()
{
    if ($this->status === 'paid') {
        return 'paid';
    }

    if ($this->status === 'draft') {
        return 'draft';
    }

    if (Carbon::today()->gt(Carbon::parse($this->due_date))) {
        return 'overdue';
    }

    return 'unpaid';
}
}
}
