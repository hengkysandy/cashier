<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'item';

    protected $fillable = [
    	'name',
    	'price',
    	'stock',
    	'status',
    ];

	public function transactiondetail()
	{
		return $this->hasMany(TransactionDetail::class, 'item_id', 'id');
	}
}
