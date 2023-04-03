<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Division;
use App\Models\Saveguide;
use App\Models\saveresort;
use App\Models\Union;
use App\Models\Upazila;
use Illuminate\Http\Request;

class travelController extends Controller
{
   public function index(){
    $divisions = Division::all();
    $districts = District::all();
    $upazilas = Upazila::all();
    $unions = Union::all();
    $saveguides = Saveguide::all();
    $resorts=saveresort::with(['divisions','district','upazila','union'])->paginate(6);
    return view('frontEnd.home.home',compact('resorts','divisions','districts','upazilas','unions','saveguides'));
   }
   public function details($id){
        return view('frontEnd.details.details', [
            'resorts' => saveresort::where('id',$id)->with(['saveguides'])->first()
        ]);
    }
    public function search(Request $request){
        $search=saveresort::where('division_id',$request->division)->orWhere('district_id',$request->district)->orWhere('person',$request->person)->orWhere('entry_fee',$request->price)->get();
        return view ('frontEnd.search.search',[
            'search'=>$search,
        ]);
    }
   public function tourPackages (){
       return view('frontEnd.tour.tour-packages',[
        'resorts'=>saveresort::all(),
       ]);
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
