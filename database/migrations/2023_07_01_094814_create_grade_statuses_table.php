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
        Schema::create('grade_statuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('homework_id');

            $table->boolean('has_homework')->default(false);
            $table->boolean('not_works')->default(false);
            $table->boolean('on_time')->default(false);
            $table->float('grade')->nullable();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('homework_id')->references('id')->on('homework');

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
        Schema::dropIfExists('grade_statuses');
    }
};
