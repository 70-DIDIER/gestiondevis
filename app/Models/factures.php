<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class factures extends Model
{
    use HasFactory;
    public function diver()
    {
        return $this->belongsTo(Diver::class);
    }
}
