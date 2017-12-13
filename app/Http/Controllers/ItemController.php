<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
	public function view(){
		$items = Item::all();

		return view('item',compact('items'));
	}

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

	public function update(Request $request){
		$item = Item::find($request->id);
		$item->name = $request->name;
		$item->price = $request->price;
		$item->stock = $request->stock;
		$item->save();

		return back();
	}

	public function delete($id){
		$item = Item::find($id);
		$item->delete();

		return back();
	}
}
