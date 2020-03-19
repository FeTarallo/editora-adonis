<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use SoftDeletes;

    protected $table = 'teacher';

    protected $fillable = ['name', 'email', 'school_id'];

    public function school() {
        return $this->belongsTo('App\School', 'id');
    }
}
