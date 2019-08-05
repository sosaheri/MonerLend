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
            'name' => 'Admin',
            'email' => 'sosaheriberto2001@gmail.com',
            'username' => 'Admin',
            'country' => 'Venezuela',
            'password' => 'oK28jbHdo28NJLeZguaPefSlsOOsWn1564987127',
        ]);
    }
}


