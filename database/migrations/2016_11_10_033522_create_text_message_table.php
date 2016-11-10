<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTextMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('text_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('message');
            $table->integer('user_id');
            $table->char('to_number',10);
            $table->char('from_number',10);

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('to_number')->references('cell_number')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('text_messages');
    }
}
