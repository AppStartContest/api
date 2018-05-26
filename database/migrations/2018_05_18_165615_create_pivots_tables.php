<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivotsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_user', function(Blueprint $table){
            $table->integer('room_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->primary(['room_id', 'user_id']);
        });

        Schema::create('expense_user', function(Blueprint $table){
            $table->integer('expense_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->primary(['expense_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_user');
        Schema::dropIfExists('expense_user');
    }
}
