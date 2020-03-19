<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchoolClass extends Model
{
    use SoftDeletes;

    protected $table = 'school_class';

    protected $fillable = ['period', 'course', 'serie', 'year', 'teacher', 'school_id'];

    // public function students() {
    //     return $this->hasMany('App\Student', 'schoolclass_id');
    // }

    public function school() {
        return $this->belongsTo('App\School', 'id');
    }

}
