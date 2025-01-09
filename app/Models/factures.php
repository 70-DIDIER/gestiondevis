<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class factures extends Model
{
    use HasFactory;
    protected $fillable = [
        'diver_id',
        'qte',
        'designation',
        'prixunit'
    ];

    public function diver()
    {
        return $this->belongsTo(Diver::class);
    }
}
