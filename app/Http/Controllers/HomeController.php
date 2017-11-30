<?php

namespace App\Http\Controllers;

use App\Room;
use App\Transaction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function view()
    {
        $rooms = Room::all();
        $transactions = Transaction::all();
        return view('Home',compact('rooms','transactions'));
    }
}
