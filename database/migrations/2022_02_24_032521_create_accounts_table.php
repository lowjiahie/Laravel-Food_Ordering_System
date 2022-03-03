<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('accountName');
            $table->string('gender');
            $table->string('accountEmail')->unique();
            $table->text('accountAddress');
            $table->string('password');
            $table->morphs('accountable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('accounts');
    }

}
