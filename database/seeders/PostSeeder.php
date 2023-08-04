<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 5000; $i++) { 
            DB::table('posts')->insert([
            'title' => Str::random(50),
            'slug' => Str::random(3).'-'.Str::random(3).'example-'.Str::random(3),
            'detail' => Str::random(1000),
            'image' => Str::random(15).'.jpg',
            'user_id' => rand(1,5),
            'category_id' => rand(1,5),
            'status' => 'active',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
