<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->delete();

        $factory=Factory::create();
        for($i=1;$i<=10;$i++){
        Brand::create([
            'name'=>$factory->firstName(),
            'category_id'=>1,
            'slug'=>$factory->slug(),
            'status'=>1,
        ]);
    }        } 

    
}
