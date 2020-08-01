<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'province_id', 'city', 'type', 'postal_code'
    ];
}
