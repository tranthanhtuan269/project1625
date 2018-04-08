<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFriendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('send_requests', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('friend_id');
            $table->index(['user_id', 'friend_id']);
            $table->primary(['user_id', 'friend_id']);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('friend_id')->references('id')->on('users');
            $table->timestamps();
        });
        Schema::create('friends', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('friend_id');
            $table->index(['user_id', 'friend_id']);
            $table->primary(['user_id', 'friend_id']);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('friend_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('send_requests');
        Schema::dropIfExists('friends');
    }
}
