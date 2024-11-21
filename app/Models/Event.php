<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $timestamps = false;
    public $fillable = [
        'contact',
        'data',
        'descriere',
        'locatie',
        'nr_max_participanti',
        'titlu',
        'photo'
    ];
    //functie pt a defini relatia ditre Event si Ticket
    //hasMany == specifica ca un event poate avea mai multe bilete asociate
    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'id_eveniment');
    }
    public function partners() {
        return $this->belongsToMany(Partner::class,'partner_event','id_eveniment','id_partener');
    }
    public function sponsors() {
        return $this->belongsToMany(Sponsor::class,'sponsor_event','id_eveniment','id_sponsor');
    }
    public function agendas() {
        return $this->hasMany(Agenda::class, 'id_eveniment');
    }
}
