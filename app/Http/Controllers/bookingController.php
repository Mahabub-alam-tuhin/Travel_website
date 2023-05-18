<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class bookingController extends Controller
{
     public $create;
    public function create($id){
        return view ('frontEnd.booking.create',compact('id'));
    }
    public function saveBooking(Request $request)
    {
        $this->create = new Booking();
        $this->create->resort_id = $request->resort_id;
        $this->create->name = $request->name;
        $this->create->email = $request->email;
        $this->create->phone = $request->phone;
        $this->create->address = $request->address;
        $this->create->save();
        return back()->with('message', 'info create successfully');
        //       return $request;


    }
}
