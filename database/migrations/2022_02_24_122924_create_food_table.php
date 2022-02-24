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
            $table->string('category')->index();
            $table->double('price');
            $table->integer('sales');
            $table->integer('quantity');
            $table->binary('image');
            $table->boolean('chefRecommended');
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
