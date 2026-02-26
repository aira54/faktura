<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessageTemplate extends Model
{
    protected $fillable = [
        'business_id',
        'template',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}