<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;
    public function users()
{
    return $this->hasMany(User::class);
}

public function owner()
{
    return $this->belongsTo(User::class, 'owner_id');
}
}
