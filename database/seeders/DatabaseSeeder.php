<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Booking;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            bookingSeeder::class
        ]);

        $this->call([
            UserSeeder::class
        ]);

        $this->call([
            incomeSeeder::class
        ]);
    }
}
