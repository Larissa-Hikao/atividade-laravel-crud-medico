<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    //
    protected $table = 'area';

    protected $fillable = ['id', 'area'];

    public function medicos(){
        return $this->hasMany('App\Medico');
    }

}
