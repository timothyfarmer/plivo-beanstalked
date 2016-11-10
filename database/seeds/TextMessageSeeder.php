<?php

use Illuminate\Database\Seeder;

class TextMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('text_messages')->insert([
        	'message' => 'I am a text message',
        	'user_id' => 1,
        	'to_number' => '19403893869',
        	'from_number' => '19403893869',
        ]);
    }
}
