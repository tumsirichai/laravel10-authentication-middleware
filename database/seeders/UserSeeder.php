<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 5; $i++) { 
            DB::table('users')->insert([
                'name' => Str::random(10),
                'role' => 'admin',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('111111'),
            ]);
        }
    }
}
