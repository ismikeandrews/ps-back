<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table      = 'tbAdmin';
    protected $primaryKey = 'codAdmin';
    protected $fillable   = ['userAdmin', 'senhaAdmin'];

    public static $rules  = [
        'userAdmin'       => 'required|max:50|string',
        'senhaAdmin'      => 'required|max:50',
    ];
}
