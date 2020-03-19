<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Introduction extends Model
{
    protected $table = 'introduction';

    protected $fillable = ['writer_name', 'writer_about', 'illustrator_name', 'illustrator_about', 'writer_image', 'illustrator_image', 'book_id'];

    public $timestamps = false;

}
