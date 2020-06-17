<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table	  = 'tbUsuario';
    protected $primaryKey = 'codUsuario';
    protected $fillable   = ['nomeUsuario', 'telefoneUsuario', 'imagemUsuario', 'codSMSUsuario', 'dataUsoSMSUsuario'];

    public static $rules  = [
        'nomeUsuario'       => 'required|max:100|string',
        'telefoneUsuario'   => 'required|max:11|min:11',
        'imagemUsuario'     => '',
        'codSMSUsuario'     => 'required|integer',
        'dataUsoSMSUsuario' => 'required|integer'
    ];

    public function CurtidaPublicacao(){
        return $this->hasMany(CurtidaPublicacao::class, 'codUsuario', 'codUsuario');
    }
}
