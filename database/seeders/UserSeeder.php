<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
         'name' =>'mahabub',
         'email' =>'test@gmail.com',
         'user_role' =>'2',
         'password' => Hash::make('12345678'),
        ]);

    }
}
