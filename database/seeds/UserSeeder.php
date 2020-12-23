<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('users')->insert([
           'name' => 'ahmed',
           'email' => 'ahmed@gmail.com',
           'password' => bcrypt(12345)
        ]);
    }
}
