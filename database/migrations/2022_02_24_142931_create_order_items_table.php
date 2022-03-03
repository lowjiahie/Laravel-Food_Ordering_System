<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('order_items', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('qty');
            
            $table->unsignedInteger('order_id')->index();
            $table->foreign('order_id')
                    ->references('id')
                    ->on('orders')
                    ->onDelete("cascade");
            
            $table->unsignedInteger("food_id")->index();
            $table->foreign("food_id")
                    ->references("id")
                    ->on("food")
                    ->onDelete("cascade");
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('order_items');
    }

}
