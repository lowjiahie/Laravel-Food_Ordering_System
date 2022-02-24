<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('dishes', function (Blueprint $table) {
            $table->increments('id')->unique();
            
            $table->string('preparationTime');
            $table->boolean('dairyFree');
            $table->boolean('glutenFree');
            $table->boolean('nutFree');
            $table->boolean('veganFriendly');
            $table->boolean('vegetarianFriendly');

            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('dishes');
    }

}
