<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PassoAtividade extends Model
{
    protected $table	  = 'tbPassoAtividade';
    protected $primaryKey = 'codPassoAtividade';
    protected $fillable   = ['numeroPassoAtividade', 'imagemPassoAtividade', 'descricaoPassoAtividade', 'codAtividade'];

    public static $rules  = [
        'numeroPassoAtividade'    => 'required|integer',
        'imagemPassoAtividade'    => 'required|max:255|string',
        'descricaoPassoAtividade' => 'required|max:255|string',
        'codAtividade'            => 'required|integer',
    ];

    public function Atividade(){
        return $this->belongsTo(Atividade::class, 'codAtividade', 'codAtividade');
    }
}
