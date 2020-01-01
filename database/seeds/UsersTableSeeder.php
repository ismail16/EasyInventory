<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => 1,
            'staff_name' => 'Admin',
            'email' => 'admin@email.com',
            'staff_phone' => '111111111',
            'staff_address' => 'Admin address',
            'password' => bcrypt('11111111'),
            'status' => 1,
        ]);
        DB::table('users')->insert([
            'role_id' => 2,
            'staff_name' => 'Staff',
            'email' => 'staff@email.com',
            'staff_phone' => '111111111',
            'staff_address' => 'Admin address',
            'password' => bcrypt('22222222'),
            'status' => 1,
        ]);

    }
}
