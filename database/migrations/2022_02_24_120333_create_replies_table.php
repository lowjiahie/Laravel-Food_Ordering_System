<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepliesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('replies', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('reply_desc');

            $table->unsignedInteger('account_id')->index();
            $table->foreign('account_id')->references('id')
                    ->on('accounts')
                    ->onDelete('cascade');

            $table->unsignedInteger('post_id')->index();
            $table->foreign('post_id')->references('id')
                    ->on('posts')
                    ->onDelete('cascade');
            
            $table->unsignedInteger('comment_id')->index();
            $table->foreign('comment_id')->references('id')
                    ->on('comments')
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
        Schema::dropIfExists('replies');
    }

}
