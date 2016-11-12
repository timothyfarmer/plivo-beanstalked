<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'tfarmer',
        	'email' => 'tfarmer4@gmail.com',
        	'password' => Hash::make('password'),
        	'cell_number' => '18888888888'
        ]);
    }
}
