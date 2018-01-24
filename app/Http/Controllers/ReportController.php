<?php

namespace App\Http\Controllers;

use App\Item;
use App\Transaction;
use App\TransactionDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function view(Request $request)
    {
    	$data['transaction'] = Transaction::latest('created_at')->orderBy('status','desc');

        if(count($data['transaction']->get()) > 0){
            $data['transaction'] = $data['transaction']->get();
            for ($currYear= Carbon::now()->year; $currYear >=  Transaction::all()->first()->created_at->year; $currYear--) { //edit
                $data['years'][] = $currYear;
            }
        }
    	
    	return view('report',$data);

        //kodingan buat ambil end time, agak bar", harus bisa pake carbon addhours aja
        // {{$data->created_at->format('H')+$data->booking_hour.":".$data->created_at->format('i') >= 24 ? ( $data->created_at->format('H')-24+$data->booking_hour.":".$data->created_at->format('i')) :  $data->created_at->format('H')+$data->booking_hour.":".$data->created_at->format('i') }}
    }

    public function filterReport(Request $request)
    {
    	$data['report_datetime'] = $request->report_time;

		$searchFrom = Carbon::parse( substr($data['report_datetime'],0, strpos($data['report_datetime'], '-')-1) );
		$searchTo = Carbon::parse( substr($data['report_datetime'], strpos($data['report_datetime'], '-')+2) ) ;

        for ($currYear= Carbon::now()->year; $currYear >=  Transaction::all()->last()->created_at->year; $currYear--) { 
            $data['years'][] = $currYear;
        }

		$data['transaction'] = Transaction::latest('created_at')
			->where('created_at','>=', $searchFrom)
            ->where('created_at','<=', $searchTo)
            ->get();

        return view('report',$data);
    }

    public function viewItem()
    {
        $data['items'] = Item::all();

        return view('reportItem', $data);
    }
}
