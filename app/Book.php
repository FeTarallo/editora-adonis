<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    protected $table = 'book';

    protected $fillable = ['name', 'sinopse', 'cover', 'school_class_id'];

    public function schoolclass() {
        return $this->belongsTo('App\SchoolClass', 'id');
    }

    public function pages(){
        return $this->hasMany('App\Page');
    }

}
