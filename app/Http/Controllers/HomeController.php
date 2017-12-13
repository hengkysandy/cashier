<?php

namespace App\Http\Controllers;

use App\Item;
use App\Room;
use App\Transaction;
use App\TransactionDetail;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function view()
    {
        $rooms = Room::all();
        $transactions = Transaction::all();
        $items = Item::all();
        return view('Home',compact('rooms','transactions', 'items'));
    }

    public function createBooking(Request $request)
    {
    	//ada attr start end time (tipe data : timestamps)
    	$transaction = Transaction::create([
    		'room_id' => $request->roomId,
    		'room_price' => $request->price,
    		'employee_id' => session()->get('userSession')->id,
    		'customer_name' => $request->name,
    		'customer_phone' => $request->phone,
    		'booking_hour' => $request->hour,
    		'status' => 'On Going'
    	]);

    	foreach($request->itemName as $index => $id){
    		if($id == "other"){
				TransactionDetail::create([
					'id_transaction' => $transaction->id,
					'item_id' => NULL,
					'item_price' => NULL,
					'other_item_name' => $request->itemOther[$index],
					'other_item_price' => $request->itemPrice[$index],
					'quantity' => $request->itemQuantity[$index] 
				]);
			} else {
				TransactionDetail::create([
					'id_transaction' => $transaction->id,
					'item_id' => $id,
					'item_price' => $request->itemPrice[$index],
					'other_item_name' => NULL,
					'other_item_price' => NULL,
					'quantity' => $request->itemQuantity[$index] 
				]);
			}
    	}

    	return back();
    }
}
