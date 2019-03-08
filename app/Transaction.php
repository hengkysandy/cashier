<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaction';
    protected $dates = ["start_time","end_time"];

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

    public function Room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }

    public function Employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    public function TransactionDetail()
    {
        return $this->hasMany(TransactionDetail::class, 'id_transaction', 'id');
    }

    public function getTotalPrice()
    {
        return $this->TransactionDetail->sum(
            function ($td) {
                return $td->quantity * $td->item_price;
            }
        );
    }

    public function getTotalPriceOther()
    {
        return $this->TransactionDetail->sum(
            function ($td) {
                return $td->quantity * $td->other_item_price;
            }
        );
    }
}
