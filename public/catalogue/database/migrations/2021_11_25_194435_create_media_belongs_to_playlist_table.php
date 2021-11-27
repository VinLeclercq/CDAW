<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaBelongsToPlaylistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('belongs_to', function (Blueprint $table) {
            $table->bigInteger('ID_media')->unsigned()->index();
            $table->foreign("ID_media")->references('id')->on('media')->onDelete('cascade');

            $table->bigInteger("ID_playlist")->unsigned()->index();
            $table->foreign('ID_playlist')->references('id')->on('playlist')->onDelete('cascade');

            $table->primary(['ID_media', 'ID_playlist']);

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
        Schema::dropIfExists('belongs_to');
    }
}
