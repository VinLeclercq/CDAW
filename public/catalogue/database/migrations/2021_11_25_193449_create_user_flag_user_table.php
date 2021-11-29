<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserFlagUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flag', function (Blueprint $table) {
            $table->bigInteger('ID_flagger')->unsigned()->index();
            $table->foreign("ID_flagger")->references('id')->on('users')->onDelete('cascade');

            $table->bigInteger("ID_flagged")->unsigned()->index();
            $table->foreign('ID_flagged')->references('id')->on('users')->onDelete('cascade');

            $table->primary(['ID_flagger', 'ID_flagged']);

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
        Schema::dropIfExists('flag');
    }
}
