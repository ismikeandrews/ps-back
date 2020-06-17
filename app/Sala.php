<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    protected $table	  = 'tbSala';
    protected $primaryKey = 'codSala';
    protected $fillable   = ['nomeSala', 'privacidadeSala', 'qtdMaxParticipantesSala', 'isAberta', 'codCriador', 'codAtividade'];

    public static $rules  = [
        'nomeSala'                => 'required|max:50|string',
        'privacidadeSala'         => 'required|boolean',
        'qtdMaxParticipantesSala' => 'required|integer|min:2',
        'isAberta'                => 'required|boolean',
        'codCriador'              => 'required|integer',
        'codAtividade'            => 'required|integer'
    ];

    public function Usuario(){
        return $this->belongsTo(Usuario::class, 'codCriador', 'codUsuario');
    }

    public function Atividade(){
        return $this->belongsTo(Atividade::class, 'codAtividade', 'codAtividade');
    }
}
