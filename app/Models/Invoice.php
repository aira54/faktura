<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
}
