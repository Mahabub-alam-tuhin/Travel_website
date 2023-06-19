<?php

namespace App\Http\Controllers;

use App\Models\income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class incomeController extends Controller
{
    public $create;
    public function create(){
        return view('admin.income.create');
    }
   
    public function saveincome(Request $request){
        $this->create=new income();
        $this->create->resort_id =$request->resort_id ;
        $this->create->user_id =$request->user_id ;
        $this->create->income_amount=$request->income_amount;
        $this->create->save();
        return back()->with('message','info create successfully');
 //       return $request;
    }

}
