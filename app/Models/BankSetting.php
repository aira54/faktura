<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankSetting extends Model
{
    protected $fillable = [
        'business_id',
        'bank_name',
        'account_number',
        'account_holder',
        'auto_send_invoice',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}