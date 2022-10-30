<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesSeeder extends Seeder
{
   
    public function run()
    {
        DB::table('categories')->delete();
           $factory=Factory::create();
           for($i=1;$i<=10;$i++){
        Category::create([
            'user_id'=>21,
            'name'=>$factory->firstName(),
            'slug'=>$factory->slug(),
            'description'=>$factory->firstName(),
            'status'=>1,
            'meta_title'=>$factory->firstName(),
            'meta_keyword'=>$factory->firstName(),
            'meta_description'=>$factory->firstName(),
        ]);
    }
    }
}
