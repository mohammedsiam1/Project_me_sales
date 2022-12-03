<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'Dashboard',
            'Orders',
            'Categories',
            'Add Category',
            'Edit Category',
            'Delete Category',
            'Brands',
            'Add brand',
            'Products',
            'Add Products',
            'View Products',
            'Colors',
            'Sliders',
            'Users',
            'Add User',
            'Permissions',
            'Sitting',
            'Send Mail Invoices',
            'Download Invoices',
            'View Invoices',
            'update status',
         
         ];
      
         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }
    }
}
