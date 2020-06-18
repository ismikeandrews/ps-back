<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{
    protected $table	  = 'tbAtividade';
    protected $primaryKey = 'codAtividade';
    protected $fillable   = ['nomeAtividade', 'imagemAtividade', 'qtdPassoAtividade', 'isPublica', 'isPrivada', 'codCategoria', 'codAdmin'];

    public static $rules  = [
        'nomeAtividade'     => 'required|max:100|string',
        'imagemAtividade'   => 'required|max:255',
        'qtdPassoAtividade' => 'required|integer',
        'isPublica'         => 'required|boolean',
        'isPrivada'         => 'required|boolean',
        'codCategoria'      => 'required|integer',
        'codAdmin'          => 'required|integer',
    ];

    public function Categoria(){
        return $this->belongsTo(Categoria::class, 'codCategoria', 'codCategoria');
    }

    public function Admin(){
        return $this->hasMany(Admin::class, 'codAdmin', 'codAdmin');
    }
}
