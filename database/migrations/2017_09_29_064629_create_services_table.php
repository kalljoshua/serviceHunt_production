<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('type_id');
            $table->integer('company_id');
            $table->integer('sub_category_id');
            $table->integer('package_id');
            $table->string('title');
            $table->string('description',10000);
            $table->string('image');
            $table->string('address');
            $table->string('district');
            $table->string('town');
            $table->string('region');
            $table->string('country');
            $table->integer('views')->default(0);
            $table->integer('rating')->default(0);
            $table->integer('suspended')->default(0);
            $table->integer('featured')->default(0);
            $table->smallInteger('active')->default(0);
            $table->smallInteger('expired')->default(0);
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
        Schema::dropIfExists('services');
    }
}
