<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserModerateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moderate', function (Blueprint $table) {
            $table->bigInteger('ID_comment')->unsigned()->index();
            $table->foreign("ID_comment")->references('id')->on('comment')->onDelete('cascade');

            $table->bigInteger("ID_user")->unsigned()->index();
            $table->foreign('ID_user')->references('id')->on('users')->onDelete('cascade');

            $table->primary(['ID_comment', 'ID_user']);

            $table->string("message");
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
        Schema::dropIfExists('moderate');
    }
}
