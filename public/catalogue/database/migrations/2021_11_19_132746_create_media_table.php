<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTable extends Migration
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
            //Duartion of a film or an episode
            $table->integer('duration_time');
            $table->date('release_date');
            $table->date('ending_date')->nullable();
            //Duration of the whole series
            $table->integer('total_duration_time')->nullable();
            $table->text('description');
            $table->enum('type', ['Film', 'Série']);
            $table->enum('status', ['En cours', 'Fini', 'Abandonné']);
            $table->string('poster_url')->nullable();
            //To rebuild to have multiple categories
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
        Schema::dropIfExists('media');
    }
}
