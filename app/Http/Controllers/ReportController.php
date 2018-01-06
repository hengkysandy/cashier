<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\TransactionDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function view(Request $request)
    {
    	$data['transaction'] = Transaction::latest('created_at')->orderBy('status','desc');

    	$data['transaction'] = $data['transaction']->get();
        for ($currYear= Carbon::now()->year; $currYear >=  Transaction::all()->first()->created_at->year; $currYear--) { //edit
            $data['years'][] = $currYear;
        }
    	return view('report',$data);
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

}
