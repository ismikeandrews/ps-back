<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParticipanteSala extends Model
{
    protected $table	  = 'tbParticipanteSala';
    protected $primaryKey = 'codParticipanteSala';
    protected $fillable   = ['codParticipante', 'codSala'];

    public static $rules  = [
        'codParticipante' => 'required|integer',
        'codSala'         => 'required|integer'
    ];

    public function Usuario(){
        return $this->belongsTo(Usuario::class, 'codUsuario', 'codParticipante');
    }

    public function Sala(){
        return $this->belongsTo(Sala::class, 'codSala', 'codSala');
    }
}
