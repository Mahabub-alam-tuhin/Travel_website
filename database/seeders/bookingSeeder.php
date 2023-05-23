<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Booking;

class bookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Booking::truncate();
        // Booking::factory(10)->create();
        for($i = 1; $i<=10;$i++){
            $book = new Booking;
            $book->name= "name jan $i";
            $book->email="email ";
            $book->phone = "phone ";
            $book->address ="address ";
            $book->status = ["approved","accepted","pending"][rand(0,2)];
            $book->created_at="2023-01-01 10:05"; 
            $book->save();
        }

         for($i = 1; $i<=15;$i++){
            $book = new Booking;
            $book->name= "name feb $i";
            $book->email="email ";
            $book->phone = "phone ";
            $book->address ="address ";
            $book->status = ["approved","accepted","pending"][rand(0,2)];
            $book->created_at="2023-02-01 10:05"; 
            $book->save();
        }


        for($i = 1; $i<=8;$i++){
            $book = new Booking;
            $book->name= "name mar $i";
            $book->email="email ";
            $book->phone = "phone ";
            $book->address ="address ";
            $book->status = ["approved","accepted","pending"][rand(0,2)];
            $book->created_at="2023-03-01 10:05"; 
            $book->save();
        }

        for($i = 1; $i<=30;$i++){
            $book = new Booking;
            $book->name= "name apr $i ";
            $book->email="email ";
            $book->phone = "phone ";
            $book->address ="address ";
            $book->status = ["approved","accepted","pending"][rand(0,2)];
            $book->created_at="2023-04-01 10:05"; 
            $book->save();
        }

        for($i = 1; $i<=50;$i++){
            $book = new Booking;
            $book->name= "name may $i ";
            $book->email="email ";
            $book->phone = "phone ";
            $book->address ="address ";
            $book->status = ["approved","accepted","pending"][rand(0,2)];
            $book->created_at="2023-05-01 10:05"; 
            $book->save();
        }
     
       
    }
}
