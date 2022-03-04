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
            $table->id();
            $table->string('name')->nullable();
            $table->date('dob')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->unique();
            $table->string('gender')->nullable();
            $table->string('password');
            $table->string('avatar')->nullable();
            $table->bigInteger('role_id')->unsigned(); 
            $table->timestamps();
            $table->rememberToken();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
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
