<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name'=>'văn tiến','email'=>'vantien2000@gmail.com','password'=>bcrypt('123456'),'remember_token'=>bcrypt('0'),'avatar'=>'avatar.png']
        ]);
    }
}
