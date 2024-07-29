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
                'team' => '0',
                'status' => 'active',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'Manager Test',
                'username' => 'manager0',
                'email' => 'manager.dailyreport@nusantaratv.com',
                'role' => 'manager',
                'title'=>'Manager Tim Test',
                'team' => '0',
                'status' => 'active',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'Sales Test',
                'username' => 'sales0',
                'email' => 'sales.dailyreport@nusantaratv.com',
                'role' => 'sales',
                'title'=>'Sales Tim Test',
                'team' => '0',
                'status' => 'active',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'Manager Team 1',
                'username' => 'manager1',
                'email' => 'manager.dailyreport@nusantaratv.com',
                'role' => 'manager',
                'title'=>'Manager Tim 1',
                'team' => '1',
                'status' => 'active',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'Sales Team 1',
                'username' => 'sales1',
                'email' => 'sales.dailyreport@nusantaratv.com',
                'role' => 'sales',
                'title'=>'Sales Tim 1',
                'team' => '1',
                'status' => 'active',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'Manager Team 2',
                'username' => 'manager2',
                'email' => 'manager.dailyreport@nusantaratv.com',
                'role' => 'manager',
                'title'=>'Manager Tim 2',
                'team' => '2',
                'status' => 'active',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'Sales Team 2',
                'username' => 'sales2',
                'email' => 'sales.dailyreport@nusantaratv.com',
                'role' => 'sales',
                'title'=>'Sales Tim 2',
                'team' => '2',
                'status' => 'active',
                'password' => bcrypt('password')
            ],
        ]);
    }
}
