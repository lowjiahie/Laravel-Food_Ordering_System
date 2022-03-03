<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments("id")->unique();

            $table->float("total");
            $table->float("amountReceived");
            $table->float("change");
            $table->float("discount");
            $table->string("status");
            
            $table->unsignedInteger("order_id")->index();
            $table->foreign("order_id")
                    ->references("id")
                    ->on("orders")
                    ->onDelete("cascade");
            
            $table->unsignedInteger("promotion_id")->index();
            $table->foreign("promotion_id")
                    ->references("id")
                    ->on("promotions")
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
        Schema::dropIfExists('payments');
    }

}
