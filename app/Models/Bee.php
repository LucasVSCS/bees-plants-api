<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bee extends Model
{
    protected $fillable = ['name', 'scientific_name'];

    public $timestamps = false;
}
