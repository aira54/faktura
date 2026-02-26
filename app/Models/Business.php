<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\BankSetting;
use App\Models\MessageTemplate;

class Business extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'owner_id',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function bankSetting()
    {
        return $this->hasOne(BankSetting::class);
    }

    public function messageTemplate()
    {
        return $this->hasOne(MessageTemplate::class);
    }
}