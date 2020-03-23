<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'page';

    protected $fillable = ['image', 'text', 'num_page', 'book_id'];

    public function book() {
        return $this->belongsTo('App\Book', 'id');
    }
}
