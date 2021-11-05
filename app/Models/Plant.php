<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    protected $fillable = ['name', 'scientific_name', 'month', 'bee_id'];

    protected $hidden = ['id', 'bee_id'];

    protected $attributes = [
        'month' => null,
    ];

    public $timestamps = false;
}
