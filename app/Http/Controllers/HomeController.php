<?php

namespace App\Http\Controllers;

use App\Item;
use App\Room;
use App\Transaction;
use App\TransactionDetail;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function view()
    {
        $data['rooms'] = Room::all();
        $data['items'] = Item::all();
        $data['time']= Carbon::now();
		$data['print'] = '';
        return view('Home',$data);
    }

    public function createBooking(Request $request)
    {
    	$times = explode(" - ", $request->date);

		$hours = [];
		$timeDetail = [];
		foreach($times as $time) {
			$detail = explode(" ", $time);
			$calculateTime = 0;
			$realTime = "";
			if($detail[2] == 'PM') {
				$calculateTime = (int)explode(":",$detail[1])[0] + 12;
				$realTime = (string)$calculateTime.":00:00";
			} else {
				$calculateTime = (int)explode(":",$detail[1])[0];
				$realTime = (string)$calculateTime.":00:00";
			}

			$dates = explode("/",$detail[0]);
			$formatedDate = $dates[2]."-".$dates[0]."-".$dates[1];

			array_push($hours, $calculateTime);
			array_push($timeDetail, [$formatedDate ,$realTime]);
		}

		$allTransaction = Transaction::all();

		foreach($allTransaction as $transaction){
			if($transaction->room_id == $request->roomId && $transaction->start_time->format("Y-m-d") == $timeDetail[0][0]){
				if($transaction->start_time->format('H')<$hours[0] && $transaction->end_time->format('H')>$hours[0])
					return redirect()->back()->withErrors('');

				if($transaction->start_time->format('H')<$hours[1] && $transaction->end_time->format('H')>$hours[1])
					return redirect()->back()->withErrors('');

				if($transaction->start_time->format('H')>=$hours[0] && $transaction->end_time->format('H')<=$hours[1])
					return redirect()->back()->withErrors('');
			}
		}

    	$transaction = Transaction::create([
    		'room_id' => $request->roomId,
    		'room_price' => $request->price,
    		'employee_id' => session()->get('userSession')->id,
    		'customer_name' => $request->name,
    		'customer_phone' => $request->phone,
    		'booking_hour' => $hours[0] > $hours[1] ? $hours[0] - $hours[1] : $hours[1] - $hours[0],
			'start_time' => $timeDetail[0][0]." ".$timeDetail[0][1],
			'end_time' => $timeDetail[1][0]." ".$timeDetail[1][1],
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

		$data['rooms'] = Room::all();
		$data['items'] = Item::all();
		$data['time']= Carbon::now();
		$data['print'] = $transaction;
		return view('Home',$data);
    }

    public function getTransaction($id){
    	$data['transaction'] = Transaction::find($id);
    	$data['employee_name'] = $data['transaction']->Employee->name;
    	$data['transactionDetail'] = TransactionDetail::where('id_transaction','=',$id)->get();
    	return $data;
    }

	public function getDetailTransaction($id){
		$data['transactionDetail'] = TransactionDetail::find($id);
		return $data;
	}

    public function getItem($id){
    	$data['item'] = Item::find($id);
    	return $data;
    }

	public function printTransaction($id){
		$data['transaction'] = Transaction::find($id);
		return view('print', $data);
	}
}
