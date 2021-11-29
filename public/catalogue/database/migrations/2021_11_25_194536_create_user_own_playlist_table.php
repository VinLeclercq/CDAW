<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserOwnPlaylistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('own', function (Blueprint $table) {
            $table->bigInteger('ID_playlist')->unsigned()->index();
            $table->foreign("ID_playlist")->references('id')->on('playlist')->onDelete('cascade');

            $table->bigInteger("ID_user")->unsigned()->index();
            $table->foreign('ID_user')->references('id')->on('users')->onDelete('cascade');

            $table->primary(['ID_playlist', 'ID_user']);

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
        Schema::dropIfExists('own');
    }
}
