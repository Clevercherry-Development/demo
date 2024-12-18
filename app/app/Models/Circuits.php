<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Circuits extends Model
{
    protected $connection = 'mongodb';

    protected $fillable = [
        'name',
        'description',
        'laps',
        'distance',
        'location',
        'active'
    ];
}
