<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//         DB::table("categories")->insert([
//             "title" =>Str::random(25) ,
           
//         ]);

for ($i=0; $i < 10; $i++) { 
    Category::create([
            "title" =>Str::random(25) ,
        
    ]);
} 



    }
}
