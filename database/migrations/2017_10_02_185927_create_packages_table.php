<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->double('price');
            $table->integer('days');
            $table->integer('featured_listings');
            $table->integer('properties');
            $table->integer('slider')->default(0);
            $table->integer('feature')->default(0);
            $table->integer('recommended')->default(0);
            $table->integer('best_value')->default(0);
            $table->integer('partner')->default(0);            
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
        Schema::dropIfExists('packages');
    }
}
