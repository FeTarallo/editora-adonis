<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'city';

    protected $fillable = ['name', 'state_id'];

    public $timestamps = false;

    public function state(){
        return $this->belongsTo('App\Entities\State','state_id');
    }
}
