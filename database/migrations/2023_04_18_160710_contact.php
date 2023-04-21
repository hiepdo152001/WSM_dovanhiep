<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Contact extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Contact' ,function(Blueprint $table){
            $table -> id();
            $table -> string('user_id');
            $table -> timestamp('content');
            $table -> integer('type');
            $table -> integer('phone');
            $table -> string('project');
            $table -> string('reason');
            $table -> timestamp('time_start');
            $table -> timestamp('time_end');
            $table -> integer('status');
            $table -> timestamp('dealine');
            $table -> timestamps();
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Contact');
    }
}
