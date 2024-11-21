<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    public $timestamps = false;
    public $fillable = [
        'titlu',
        'descriere',
        'id_eveniment'
    ];
    public function speakers() {
        return $this->belongsToMany(Speaker::class, 'agenda_speaker', 'id_speaker', 'id_agenda');
    }
}
