<?php

namespace Database\Seeders;

use App\Models\userRole_id;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class userRole_idSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        userRole_id::truncate();

        userRole_id::create([
          'name' => 'user',
          'role_id' => '1',
        ]);
    
        userRole_id::create([
          'name' => 'admin',
          'role_id' => '2',
        ]);
    }
}
