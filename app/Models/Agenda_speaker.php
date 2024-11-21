<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda_speaker extends Model
{
    public $timestamps = false;
    public $fillable = [
        'id_speaker',
        'id_agenda'
    ];
}
