<?php

namespace App\Http\Controllers;
use App\Models\Saveguide;
use App\Models\Booking;
use App\Models\income;
use App\Models\saveresort;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
 

class AdminController extends Controller
{
    public function index(){
        $saveguides = Saveguide::all()->count();
        $book = Booking::all()->count();
        $saveresorts = saveresort::all()->count();
        $total_income=Booking::sum('price');
        $visitors = [6000, 200, 3000, 9000, 500];
        $income = [50, 15, 30, 40, 10];
        //  dd( $total_income);
        $monthly_bookings = [];
        for ($i=0; $i < 5; $i++) { 
            $monthly_bookings[] = Booking::WhereMonth('created_at',Carbon::now()->subMonth($i)->format('m'))->count();
        }
        $monthly_bookings = array_reverse($monthly_bookings);



        $monthly_income = [];
        for ($i=0; $i < 5; $i++) { 
            $monthly_income[] = income::WhereMonth('created_at',Carbon::now()->subMonth($i)->format('m'))->count();
        }
        $monthly_income = array_reverse($monthly_income);
        // dd($monthly_income);


        


       
        // return DB::table('incomes')->sum('income_amount');    
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
            'monthly_bookings',
            'monthly_income',
            'total_income'
        ));
    }
}
