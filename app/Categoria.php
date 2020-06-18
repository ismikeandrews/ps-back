<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table	  = 'tbCategoria';
    protected $primaryKey = 'codCategoria';
    protected $fillable   = ['nomeCategoria', 'imagemCategoria', 'codAdmin'];

    public static $rules  = [
        'nomeCategoria'   => 'required|max:50|string',
        'imagemCategoria' => 'required|max:50|string',
        'codAdmin'        => 'required|integer'
    ];

    public function Admin(){
        return $this->hasMany(Admin::class, 'codAdmin', 'codAdmin');
    }
}
