<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;

    protected $table = 'student';

    protected $fillable = ['name', 'schoolclass_id'];

    public $timestamps = false;

    public function schoolclass() {
        return $this->belongsTo('App\SchoolClass','id');
    }
}
