<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments("id")->unique();
            $table->string("booking_no")->unique();
            $table->dateTime("booking_datetime");
            $table->string("state");
            $table->string("nickname");
            $table->string("cus_phoneNum");
            $table->unsignedInteger("numPersons");
            
            $table->unsignedInteger("account_id");
            $table->foreign("account_id")
                    ->references("id")
                    ->on("accounts")
                    ->onDelete("cascade");

            $table->unsignedInteger("table_num")->nullable();
            $table->foreign("table_num")->nullable()
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
        Schema::dropIfExists('bookings');
    }

}
