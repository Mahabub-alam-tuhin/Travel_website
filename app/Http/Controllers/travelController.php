<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class travelController extends Controller
{
   public function index(){
       return view('frontEnd.home.home');
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
