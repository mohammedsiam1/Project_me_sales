<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $factory=Factory::create();
        for($i=1;$i<=20;$i++){
         User::create(['first_name'=>$factory->firstName,'last_name'=>$factory->lastName,'email'=>$factory->unique()->safeEmail,'password'=>bcrypt('123123123'),'phone'=>$factory->unique()->numberBetween(100000,9999999),'remember_token'=>Str::random(10),'status'=>1,]);
        }
        User::create(['first_name'=>'mohammed','last_name'=>'siam','email'=>'moh@gmail.com','password'=>bcrypt('123123123'),'phone'=>$factory->unique()->numberBetween(100000,9999999),'remember_token'=>Str::random(10),'status'=>0,]);

    }
}
