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
        for ($i=0; $i < 10; $i++) { 
            DB::table('posts')->insert([
            'title' => Str::random(80),
            'slug' => Str::random(10).'-'.Str::random(10).'example-'.Str::random(10),
            'detail' => 'Ullamco incididunt officia ea consectetur et elit Lorem qui proident. Fugiat cillum aute laborum dolor aliquip enim minim culpa anim veniam in do irure occaecat. Velit et pariatur est tempor et exercitation veniam consequat.'.Str::random(1000),
            'image' => Str::random(10).'.jpg',
            'user_id' => rand(1,5),
            'category_id' => rand(1,5),
            'status' => 'active',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
