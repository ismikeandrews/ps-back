<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicacao extends Model
{
    protected $table	  = 'tbPublicacao';
    protected $primaryKey = 'codPublicacao';
    protected $fillable   = ['legendaPublicacao', 'imagemPublicacao', 'codUsuario', 'codAtividade'];

    public static $rules  = [
        'legendaPublicacao' => 'required|max:250|string',
        'imagemPublicacao'  => 'required',
        'codUsuario'        => 'required|integer',
        'codAtividade'      => 'required|integer'
    ];

    public function Usuario(){
        return $this->belongsTo(Usuario::class, 'codUsuario', 'codUsuario');
    }

    public function Atividade(){
        return $this->belongsTo(Atividade::class, 'codAtividade', 'codAtividade');
    }
}
