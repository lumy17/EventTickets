<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    public $timestamps = false;
    public $fillable = [
        'nume',
        'prenume',
        'descriere',
        'nr_tel'
    ];
    //belongsToMany modeleaza relatia many to many si am nevoie de un tabel intersectie pt acesta
    public function events() {
        return $this->belongsToMany(Event::class, 'partner_event', 'id_partener', 'id_eveniment');
    }
}
