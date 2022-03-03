<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDineInsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('dine_ins', function (Blueprint $table) {
            $table->increments("id")->unique();
            $table->unsignedInteger('order_id')->index();
            $table->foreign('order_id')
                    ->references('id')
                    ->on('orders')
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
        Schema::dropIfExists('dine_ins');
    }

}
