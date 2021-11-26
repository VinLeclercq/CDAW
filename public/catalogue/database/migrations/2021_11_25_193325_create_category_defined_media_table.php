<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryDefinedMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('defined', function (Blueprint $table) {
            $table->bigInteger('ID_media')->unsigned()->index();
            $table->foreign("ID_media")->references('id')->on('media')->onDelete('cascade');

            $table->bigInteger("ID_category")->unsigned()->index();
            $table->foreign('ID_category')->references('id')->on('categories')->onDelete('cascade');

            $table->primary(['ID_media', 'ID_category']);

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
        Schema::dropIfExists('defined');
    }
}
