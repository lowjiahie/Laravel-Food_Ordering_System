<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('comment_desc');
            
            $table->unsignedInteger('account_id')->index();
            $table->foreign('account_id')->references('id')
                    ->on('accounts')
                    ->onDelete('cascade');
            
            $table->unsignedInteger('post_id')->index();
            $table->foreign('post_id')->references('id')
                    ->on('posts')
                    ->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('comments');
    }

}
