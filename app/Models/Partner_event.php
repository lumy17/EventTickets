<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner_event extends Model
{
    public $timestamps = false;
    public $fillable = [
        'id_eveniment',
        'id_partener'
    ];
}
