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
            $table->string("status");
            
            $table->unsignedInteger("account_id")->index();
            $table->foreign("account_id")
                    ->references("id")
                    ->on("accounts")
                    ->onDelete("cascade");

            $table->unsignedInteger("table_num")->index();
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
