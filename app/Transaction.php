<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaction';
    
    protected $fillable = [
    	'room_id',
    	'room_price',
    	'employee_id',
    	'customer_name',
    	'customer_phone',
    	'booking_hour',
        'start_time',
        'end_time',
    	'status',
    ];

    public function TransactionDetail(){
        return $this->hasMany(TransactionDetail::class,'transaction_id','id');
    }
}
