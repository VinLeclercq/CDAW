<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liked', function (Blueprint $table) {
            $table->bigInteger('ID_user')->unsigned()->index();
            $table->foreign("ID_user")->references('id')->on('users')->onDelete('cascade');

            $table->bigInteger("ID_media")->unsigned()->index();
            $table->foreign('ID_media')->references('id')->on('media')->onDelete('cascade');

            $table->primary(['ID_media', 'ID_user']);
            
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
        Schema::dropIfExists('liked');
    }
}
