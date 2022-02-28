<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments("id")->unique();
            $table->string("note");
            $table->string("serviceMode");
            
            $table->unsignedInteger("customer_id");
            $table->foreign("customer_id")
                    ->references("id")
                    ->on("customers")
                    ->onDelete("cascade");

            $table->unsignedInteger("payment_id");
            $table->foreign("payment_id")
                    ->references("id")
                    ->on("payments")
                    ->onDelete("cascade");

            $table->unsignedInteger("table_num");
            $table->foreign("table_num")
                    ->references("table_num")
                    ->on("tables")
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
        Schema::dropIfExists('orders');
    }

}
