<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function view()
    {
        if (session()->get('userSession')->role_id == 2) {
            return back();
        }
        
        $rooms = Room::all();

        return view('room', compact('rooms'));
    }

    public function create(Request $request)
    {
        Room::create(
            [
            'name' => $request->name,
            'price' => $request->price,
            'type' => $request->type,
            ]
        );

        return back();
    }

    public function update(Request $request)
    {
        $room = Room::find($request->id);
        $room->name = $request->name;
        $room->type = $request->type;
        $room->price = $request->price;
        $room->save();

        return back();
    }

    public function delete($id)
    {
        $room = Room::find($id);
        $room->delete();

        return back();
    }
}
