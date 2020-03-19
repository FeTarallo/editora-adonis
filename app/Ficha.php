<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ficha extends Model
{
    protected $table = 'ficha';

    protected $fillable = ['writer_name', 'writer_lastname', 'illustrator_name', 'illustrator_lastname', 'reviewer_name', 'reviewer_lastname', 'book_id'];

    public $timestamps = false;
}
