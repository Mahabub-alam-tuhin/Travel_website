<?php

namespace Database\Seeders;

use App\Models\income;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class incomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        income::truncate();
        // Booking::factory(10)->create();
        for($i = 1; $i<=10;$i++){
            $come = new income;
            $come->resort_id = $i;
            $come->user_id =$i;
            $come->income_amount = 5;
            $come->created_at="2023-01-01 10:05"; 
            $come->save();
        }

         for($i = 1; $i<=15;$i++){
            $come = new income;
            $come->resort_id= $i;
            $come->user_id=$i;
            $come->income_amount = 8;
            $come->created_at="2023-02-01 10:05"; 
            $come->save();
        }

    }
}
