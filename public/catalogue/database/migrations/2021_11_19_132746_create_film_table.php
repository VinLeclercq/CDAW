<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('episode_nb')->nullable();
            $table->integer('duration_time')->nullable();
            $table->date('release_date');
            $table->date('ending_date')->nullable();
            $table->timestamps();
            $table->integer('total_duration_time');
            $table->string('description');
            $table->boolean('type');
            $table->string('status');
            $table->foreignId('category_id')->constrained('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('film');
    }
}
