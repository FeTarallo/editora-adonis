<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{
    use SoftDeletes;

    protected $table = 'school';

    protected $fillable = ['name', 'principal', 'email', 'telephone', 'address_id', 'user_id'];

    public function address(){
        return $this->hasOne('App\Address','id');
    }

    public function user(){
        return $this->hasOne('App\User','user_id');
    }
}
