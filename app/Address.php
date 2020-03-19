<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';

    protected $fillable = ['street', 'number', 'district', 'cep', 'complement', 'city'];

    public $timestamps = false;
}
