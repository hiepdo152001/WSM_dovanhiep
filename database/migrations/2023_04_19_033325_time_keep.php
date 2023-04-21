<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TimeKeep extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timeKeep', function(Blueprint  $table){
          $table-> id();
          $table-> integer('user_id');
          $table-> timestamp('time_in');
          $table-> timestamp('time_out');
          $table-> timestamp('day');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timeKeep');
    }
}
