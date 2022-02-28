<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveriesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('track_no')->unique();
            $table->string('address');

            $table->unsignedInteger('staff_id')->index();
            $table->foreign('staff_id')->references('id')
                    ->on('staff')
                    ->onDelete('cascade');

            $table->unsignedInteger("order_id")->unique();
            $table->foreign("order_id")
                    ->references("id")
                    ->on("orders")
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
        Schema::dropIfExists('deliveries');
    }

}
