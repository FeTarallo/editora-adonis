<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'state';

    protected $fillable = ['name', 'uf'];

    public $timestamps = false;

    public function cities(){
        return $this->hasMany('App\Entities\City');
    }
}
