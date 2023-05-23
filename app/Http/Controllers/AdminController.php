<?php

namespace App\Http\Controllers;

use App\Models\Saveguide;
use App\Models\Booking;
use App\Models\saveresort;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 

class AdminController extends Controller
{
    public function index(){
        $saveguides = Saveguide::all()->count();
        $book = Booking::all()->count();
        $saveresorts = saveresort::all()->count();
        $visitors = [6000, 200, 3000, 9000, 500];
        $income = [50, 15, 30, 40, 10];

        $monthly_bookings = [];
        for ($i=0; $i < 5; $i++) { 
            $monthly_bookings[] = Booking::WhereMonth('created_at',Carbon::now()->subMonth($i)->format('m'))->count();
        }
        $monthly_bookings = array_reverse($monthly_bookings);
        
        $books=Booking::select(
            DB::raw("(COUNT(*)) as booking"),
            DB::raw('MONTHNAME(created_at) as month_name')
        )
        ->whereYear('created_at', date('Y'))
        ->groupBy('month_name')
        ->get()->toArray();

        $fee = saveresort::select(
            DB::raw("(COUNT(*)) as income"),
            DB::raw('MONTHNAME(created_at) as month_name')
        )
        ->whereYear('created_at', date('Y'))
        ->groupBy('month_name')
        ->get()->toArray();
    //   dd($fee);
        
        return view('admin.home.home',compact(
            'visitors',
            'income',
            'saveguides',
            'book',
            'saveresorts',
            'books',
            'fee',
            'monthly_bookings'
        ));
    }
}
