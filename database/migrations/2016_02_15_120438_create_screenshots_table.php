<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateScreenshotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('screenshots', function (Blueprint $table) {
            $table->increments('id');
            $table->string("fichier");
            $table->string("tag")->nullable();
            $table->text("legende");
            $table->tinyInteger("ordre")->unsigned()->default(1);
            $table->integer("projet_id")->unsigned();

            $table->foreign("projet_id")
                ->references('id')
                ->on("projets")
                ->onDelete("cascade");

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
        Schema::drop('screenshots');
    }
}
