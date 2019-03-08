<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $table = 'transaction_detail';

    protected $fillable = [
        'id_transaction',
        'item_id',
        'item_price',
        'other_item_name',
        'other_item_price',
        'quantity',
    ];

    public function Item()
    {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }
}
