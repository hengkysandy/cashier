<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function create(Request $request)
    {
    	Item::create([
    		'name' => $request->name,
    		'price' => $request->price,
    		'stock' => $request->stock,
    		'status' => 'active',
    	]);

    	return back();
    }
}
