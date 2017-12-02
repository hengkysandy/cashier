<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function create(Request $request)
    {
    	Room::create([
    		'name' => $request->name,
			'price' => $request->price,
			'type' => $request->type,
    	]);

    	return back();
    }


}
