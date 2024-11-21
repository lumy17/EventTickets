<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    public $timestamps = false;
    public $fillable = [
        'nume',
        'descriere',
        'nr_tel'
    ];
    public function agendas() {
        return $this->belongsToMany(Agenda::class, 'agenda_speaker', 'id_speaker', 'id_agenda');
    }
    
}
