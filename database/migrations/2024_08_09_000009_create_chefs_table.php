<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChefsTable extends Migration
{
    public function up()
    {
        Schema::create('chefs', function (Blueprint $table) {
            $table->id('chef_id');
            $table->string('user_name')->unique();
            $table->string('first_name');
            $table->string('second_name')->nullable();
            $table->string('last_name');
            $table->string('image_path')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->text('overview')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('mobile_number')->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->unsignedBigInteger('state_id')->nullable();
            $table->foreign('state_id')->references('state_id')->on('states')->onDelete('set null');
            $table->tinyInteger('is_frozen')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('chefs');
    }
}
