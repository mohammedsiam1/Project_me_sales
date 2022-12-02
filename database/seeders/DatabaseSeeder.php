<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Database\Seeders\ColorSeeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Database\Seeders\CategoriesSeeder;
use Spatie\Permission\Models\Permission;

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
         User::create(['first_name'=>$factory->firstName,'last_name'=>$factory->lastName,
         'email'=>$factory->unique()->safeEmail,'password'=>bcrypt('123123123'),
         'phone'=>$factory->unique()->numberBetween(100000,9999999),
         'remember_token'=>Str::random(10),
         'role'=>1,'status'=>1,]);
        }
        $user=User::create(['first_name'=>'mohammed','last_name'=>'siam',
        'email'=>'moh@gmail.com','password'=>bcrypt('123123123'),
        'phone'=>$factory->unique()->numberBetween(100000,9999999),
        'remember_token'=>Str::random(10),
        'role'=>0,'status'=>1,]);
        
        $role = Role::create(['name' => 'Admin']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
       
        $this->call(ColorSeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(PermissionTableSeeder::class);
    }
}
