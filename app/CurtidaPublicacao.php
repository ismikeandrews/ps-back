<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CurtidaPublicacao extends Model
{
    protected $table	  = 'tbCurtidaPublicacao';
    protected $primaryKey = 'codCurtidaPublicacao';
    protected $fillable   = ['codUsuario', 'codPublicacao'];

    public static $rules  = [
        'codUsuario'    => 'required|integer',
        'codPublicacao' => 'required|integer'
    ];

    public function Usuario(){
        return $this->belongsTo(Usuario::class, 'codUsuario', 'codUsuario');
    }

    public function Publicacao(){
        return $this->belongsTo(Publicacao::class, 'codPublicacao', 'codPublicacao');
    }
}
