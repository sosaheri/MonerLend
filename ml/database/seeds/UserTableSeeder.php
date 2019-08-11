<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('users')->insert([
            'name' => 'Heriberto Sosa',
            'email' => 'sosaheriberto2001@gmail.com',
            'token_mrl' => 0,
            'username' => 'Admin',
            'country' => 'Venezuela',
            'password' => bcrypt('venezuela'),
            'status' => 1,
        ]);
    }
}


