<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public $timestamps = false;
    public $fillable = [
        'pret',
        'status',
        'invitatie',
        'id_eveniment',
        'id_tranzactie'
    ];
}
