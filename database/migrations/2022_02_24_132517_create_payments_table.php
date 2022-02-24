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
            
            $table->unsignedInteger("promotion_id");
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
