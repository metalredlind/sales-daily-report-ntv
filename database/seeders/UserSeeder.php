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
                'password' => bcrypt('password@sales')
            ],
        ]);
    }
}
