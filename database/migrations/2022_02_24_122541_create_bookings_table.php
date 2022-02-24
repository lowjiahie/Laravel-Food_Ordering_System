<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('booking_no')->unique();
            $table->date('booking_date');
            $table->time('booking_time');
            $table->unsignedInteger('num_persons');
            
            $table->unsignedInteger('table_id')->index();
            $table->foreign('table_id')->references('id')
                    ->on('tables')
                    ->onDelete('cascade');
            
            $table->unsignedInteger('customer_id')->index();
            $table->foreign('customer_id')->references('id')
                    ->on('customers')
                    ->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
