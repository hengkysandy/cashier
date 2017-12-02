<?php

namespace App\Http\Controllers;

use App\Item;
use App\Room;
use App\Transaction;
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
}
