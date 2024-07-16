<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Administrator',
                'username' => 'admin',
                'email' => 'admin.dailyreport@nusantaratv.com',
                'role' => 'admin',
                'title'=>'Administrator',
                'status' => 'active',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'Manager Test',
                'username' => 'manager0',
                'email' => 'manager.dailyreport@nusantaratv.com',
                'role' => 'manager',
                'title'=>'Manager Tim Test',
                'status' => 'active',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'Sales Test',
                'username' => 'sales0',
                'email' => 'sales.dailyreport@nusantaratv.com',
                'role' => 'sales',
                'title'=>'Sales Tim Test',
                'status' => 'active',
                'password' => bcrypt('password')
            ],
        ]);
    }
}
