<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SettingsTableSeeder extends Seeder
{
    public function run()
    {
         DB::table('settings')->insert([
            'store_name' => 'Easy Inventory',
            'store_logo' => 'default.png',
            'owner_name' => 'Admin',
            'owner_image' => 'default.png',
            'store_mobile' => '123456789',
            'store_email' => 'admin@email.com',
            'navbar_color' => 'navbar-light',
            'sidebar_color' => 'sidebar-light-navy',
            'text_size' => '1',
            'store_address' => 'Dhaka',
            'status' => 1,
        ]);
    }
}
