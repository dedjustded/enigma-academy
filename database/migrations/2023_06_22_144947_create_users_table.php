<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('username');
            $table->string('password')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->unsignedBigInteger('role_id')->nullable();
            $table->text('phone')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('language')->nullable();
            $table->string('repository')->nullable();
            $table->text('info')->nullable();
            $table->string('link')->nullable();
            $table->string('web_page_name')->nullable();
            $table->string('messenger_name')->nullable();
            $table->string('hoby')->nullable();
            $table->string('skils')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('role_id')->references('id')->on('roles');
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
};
