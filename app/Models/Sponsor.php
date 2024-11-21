<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    public $timestamps = false;
    public $fillable = [
        'nume',
        'prenume',
        'descriere',
        'nr_tel',
        'suma'
    ];
    public function events() {
        return $this->belongsToMany(Event::class,'sponsor_event','id_sponsor','id_eveniment');
    }
}
