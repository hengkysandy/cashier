<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'room';

    protected $fillable = [
    	'name',
    	'price',
    	'type',
    ];
}
