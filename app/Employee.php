<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employee';

    protected $fillable = [
    	'role_id',
    	'email',
    	'name',
    	'password',
    	'status',
    ];
    
}
