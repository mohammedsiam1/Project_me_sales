<?php
namespace Database\Seeders;

use Faker\Factory;
use App\Models\Color;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{

    public function run (){
        DB::table('colors')->delete();

        $factory=Factory::create();
        for($i=1;$i<=10;$i++){
        Color::create([
            'name'=>$factory->colorName(),
            'code'=>'123',
            'status'=>1,
        ]);
    }        } 

}