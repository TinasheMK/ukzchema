<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTerminatedMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terminated_members', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('user_id')->nullable();
            $table->float('balance')->nullable();
            $table->string('email')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_names')->nullable();
            $table->string('last_name')->nullable();
            $table->string('dob')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('street')->nullable();
            $table->string('zip')->nullable();
            $table->string('gender')->nullable();
            $table->string('phone')->nullable();
            $table->string('nok_city')->nullable();
            $table->string('nok_country')->nullable();
            $table->string('nok_dob')->nullable();
            $table->string('nok_email')->nullable();
            $table->string('nok_full_name')->nullable();
            $table->string('nok_phone')->nullable();
            $table->string('nok_street')->nullable();
            $table->string('nok_zip')->nullable();
            $table->string('orderID')->nullable();
            $table->text('bio')->nullable();
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
        Schema::dropIfExists('terminated_members');
    }
}
