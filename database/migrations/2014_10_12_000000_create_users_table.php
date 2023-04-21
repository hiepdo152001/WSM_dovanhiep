<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table-> id();
            $table-> string('department')->nullable();
            $table-> string('position')->nullable();
            $table-> string('email')->unique();
            $table-> string('password');
            $table-> string('name')->nullable();
            $table-> integer('phone')->nullable();
            $table-> timestamp('age')->nullable();
            // $table-> string('location')->nullable();
            $table-> string('project')->nullable();
            $table-> string('sex')->nullable()->nullable();
            $table-> string('permanent_address')->nullable();
            $table-> string('seniority')->nullable();
            $table-> timestamp('working_day')->nullable();
            $table-> timestamp('promotion_day')->nullable();
            $table-> string('contract')->nullable();
            $table-> string('temporary_address')->nullable();
            $table-> string('CCCD')->unique()->nullable();
            $table-> timestamp('date_range')->nullable();
            $table-> string('issued_by')->nullable();
            $table-> string('personal_email')->nullable();
            $table-> integer('tax_code')->nullable();
            $table-> integer('leave_days')->nullable();
            $table-> string('use_property')->nullable();
            $table-> string('avatar')->nullable();
            $table-> rememberToken();
            $table-> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
