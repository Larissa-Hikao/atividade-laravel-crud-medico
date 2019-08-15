<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medico extends Model
{
    
    use SoftDeletes;
    //
    protected $table = 'medico';

    protected $fillable = ['nome', 'data_nascimento','crm', 'area_id'];

    public function area(){
        return $this->belongsTo('App\Area');
    }
}
