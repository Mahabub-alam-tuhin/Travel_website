<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class show_bookingController extends Controller
{
    public function view(){
        return view('admin.show_booking.view',[
            'Book'=>Booking::all()
                ]);       
        }
    public function details($id){
        return view('admin.show_booking.details',[
            'details'=>Booking::find($id)
      ]);
    }

    public function update(Request $request, $id){ 
        $details= Booking::where('id', $id)->first();
        $details->name= $request->name;
        $details->email= $request->email;
        $details->phone= $request->phone;
        $details->price= $request->price;
        $details->address= $request->address;
        $details->status= $request->status;
        $details->update();
        return redirect()->back();
    }

    public function delete($id)
    {
         Booking::where('id', $id)->delete();
        return redirect()->route('admin.show_booking.view');
    }
}
