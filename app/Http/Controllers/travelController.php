<?php

namespace App\Http\Controllers;


use App\Models\saveresort;
use Illuminate\Http\Request;

class travelController extends Controller
{
   public function index(){
    $resorts=saveresort::with(['divisions','district','upazila','union'])->paginate(6);
    return view('frontEnd.home.home',compact('resorts'));
   }
   public function details($id){
        return view('frontEnd.details.details', [
            'resorts' => saveresort::where('id',$id)->with(['saveguides'])->first()
        ]);
    }


   public function tourPackages (){
       return view('frontEnd.tour.tour-packages');
   }
    public function about (){
        return view('frontEnd.about.about');
    }
    public function service (){
        return view('frontEnd.service.service');
    }
    public function contact (){
        return view('frontEnd.contact.contact');
    }
}
