<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->bigInteger('person_id')->unsigned();
            $table->foreign('person_id')->references('id')->on('base_people');
            $table->string('username',100)->unique();
            $table->timestamp('username_verified_at')->nullable();
            $table->string('password',100);
            $table->date('expire_date')->nullable();
            $table->boolean('status');
            $table->boolean('block')->nullable();
            $table->time('unblock_time')->nullable();
            $table->integer('wrong_trying',false,true)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
