<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 5; $i++) { 
            DB::table('post_categories')->insert([
                'name' => Str::random(10),
                'slug' => Str::random(5).'-'.Str::random(3).'example-'.Str::random(5),
                'user_id' => rand(1,5),
                'status' => 'active'
            ]);
        }
    }
}
