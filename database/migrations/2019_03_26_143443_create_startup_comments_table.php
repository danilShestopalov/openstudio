<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStartupCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('startup_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('body');
            $table->integer('likes')->default(0);

            $table->integer('creator_id')->unsigned();
            $table->foreign('creator_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->integer('startup_id')->unsigned();
            $table->foreign('startup_id')
                ->references('id')
                ->on('startups');

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
        Schema::dropIfExists('startup_comments');
    }
}
