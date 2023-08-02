<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
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
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};