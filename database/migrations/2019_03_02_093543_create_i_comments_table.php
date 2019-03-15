<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateICommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('body');

            $table->integer('creator_id')->unsigned();
            $table->foreign('creator_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->integer('idea_id')->unsigned();
            $table->foreign('idea_id')
                ->references('id')
                ->on('ideas');

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
        Schema::dropIfExists('i_comments');
    }
}
