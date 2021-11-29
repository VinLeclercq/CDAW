<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonDirectMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direct', function (Blueprint $table) {
            $table->bigInteger('ID_media')->unsigned()->index();
            $table->foreign("ID_media")->references('id')->on('media')->onDelete('cascade');

            $table->bigInteger("ID_person")->unsigned()->index();
            $table->foreign('ID_person')->references('id')->on('person')->onDelete('cascade');

            $table->primary(['ID_media', 'ID_person']);

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
        Schema::dropIfExists('direct');
    }
}
