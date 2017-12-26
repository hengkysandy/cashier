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
		if(session()->get('userSession')->id != "") {
			$data['rooms'] = Room::all();
			$data['items'] = Item::all();
			$data['time'] = Carbon::now();
			return view('Home', $data);
		} else {
			return redirect('/');
		}
    }

    public function createBooking(Request $request)
    {
    	$times = explode(" - ", $request->date);

//		$hours = [];
//		$timeDetail = [];
//		foreach($times as $time) {
//			$detail = explode(" ", $time);
//			$calculateTime = 0;
//			$realTime = "";
//			if($detail[2] == 'PM') {
//				$calculateTime = (int)explode(":",$detail[1])[0] + 12;
//				$realTime = (string)$calculateTime.":00:00";
//			} else {
//				$calculateTime = (int)explode(":",$detail[1])[0];
//				$realTime = (string)$calculateTime.":00:00";
//			}
//
//			$dates = explode("/",$detail[0]);
//			$formatedDate = $dates[2]."-".$dates[0]."-".$dates[1];
//
//			array_push($hours, $calculateTime);
//			array_push($timeDetail, [$formatedDate ,$realTime]);
//		}
//
//		$allTransaction = Transaction::all();
//
//		foreach($allTransaction as $transaction){
//			if($transaction->room_id == $request->roomId && $transaction->start_time->format("Y-m-d") == $timeDetail[0][0]){
//				if($transaction->start_time->format('H')<$hours[0] && $transaction->end_time->format('H')>$hours[0])
//					return redirect()->back()->withErrors('');
//
//				if($transaction->start_time->format('H')<$hours[1] && $transaction->end_time->format('H')>$hours[1])
//					return redirect()->back()->withErrors('');
//
//				if($transaction->start_time->format('H')>=$hours[0] && $transaction->end_time->format('H')<=$hours[1])
//					return redirect()->back()->withErrors('');
//			}
//		}

    	$transaction = Transaction::create([
    		'room_id' => $request->roomId,
    		'room_price' => $request->price,
    		'employee_id' => session()->get('userSession')->id,
    		'customer_name' => $request->name,
    		'customer_phone' => $request->phone,
    		'booking_hour' => $request->hour,
    		'status' => 'On Going'
    	]);

		if(count($request->itemName)>0) {
			foreach ($request->itemName as $index => $id) {
				if ($id == "other") {
					TransactionDetail::create([
						'id_transaction' => $transaction->id,
						'item_id' => NULL,
						'item_price' => NULL,
						'other_item_name' => $request->itemOther[$index],
						'other_item_price' => $request->itemPrice[$index],
						'quantity' => $request->itemQuantity[$index]
					]);
				} else {

					$item = Item::find($id);
					$item->stock = $item->stock - $request->itemQuantity[$index];
					$item->save();

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
		}

		return "success";
    }

	public function updateStatus($id){
		$transaction = Transaction::find($id);
		$transaction->status = "Finalize";
		$transaction->save();
		return back();
	}

	public function updateTransaction(Request $request){
		foreach ($request->itemName as $index => $id) {
			if ($id == "other") {
				TransactionDetail::create([
					'id_transaction' => $request->id,
					'item_id' => NULL,
					'item_price' => NULL,
					'other_item_name' => $request->itemOther[$index],
					'other_item_price' => $request->itemPrice[$index],
					'quantity' => $request->itemQuantity[$index]
				]);
			} else {

				$item = Item::find($id);
				$item->stock = $item->stock - $request->itemQuantity[$index];
				$item->save();

				TransactionDetail::create([
					'id_transaction' => $request->id,
					'item_id' => $id,
					'item_price' => $request->itemPrice[$index],
					'other_item_name' => NULL,
					'other_item_price' => NULL,
					'quantity' => $request->itemQuantity[$index]
				]);
			}
		}

		return "success";
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
