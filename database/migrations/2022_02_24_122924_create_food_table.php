<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('food', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('foodName')->unique();
            $table->string('foodDescription');
            $table->string('category')->index();
            $table->double('price');
            $table->integer('placingNumberInSales');
            $table->integer('quantity');
            $table->string('image_path');
            $table->morphs('foodable');
            $table->timestamps();

            $table->foreign('category')->references('categoryName')
                    ->on('categories')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('food');
    }

}
