<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('room_user', function (Blueprint $table) {
            $table->foreign('room_id')->references('id')->on('rooms')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('user_phone')->references('phone')->on('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });

        Schema::table('expense_user', function (Blueprint $table) {
            $table->foreign('expense_id')->references('id')->on('expenses')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('user_phone')->references('phone')->on('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });

        Schema::table('expenses', function (Blueprint $table) {
            $table->foreign('room_id')->references('id')->on('rooms')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('user_phone')->references('phone')->on('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });

        Schema::table('events', function (Blueprint $table) {
            $table->foreign('room_id')->references('id')->on('rooms')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });

        Schema::table('messages', function (Blueprint $table) {
            $table->foreign('user_phone')->references('phone')->on('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('room_id')->references('id')->on('rooms')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('event_id')->references('id')->on('events')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('expense_id')->references('id')->on('expenses')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('room_user', function (Blueprint $table) {
            $table->dropForeign('room_user_user_phone_foreign');
            $table->dropForeign('room_user_room_id_foreign');
        });

        Schema::table('expense_user', function (Blueprint $table) {
            $table->dropForeign('expense_user_expense_id_foreign');
            $table->dropForeign('expense_user_user_phone_foreign');
        });

        Schema::table('expenses', function (Blueprint $table) {
            $table->dropForeign('expenses_room_id_foreign');
            $table->dropForeign('expenses_user_phone_foreign');
        });

        Schema::table('events', function (Blueprint $table) {
            $table->dropForeign('events_room_id_foreign');
        });

        Schema::table('messages', function (Blueprint $table) {
            $table->dropForeign('messages_room_id_foreign');
            $table->dropForeign('messages_event_id_foreign');
            $table->dropForeign('messages_expense_id_foreign');
            $table->dropForeign('messages_user_phone_foreign');
        });
    }
}
