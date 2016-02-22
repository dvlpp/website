<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTechnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('technos', function (Blueprint $table) {
            $table->increments('id');
            $table->string("nom");

            $table->timestamps();
        });

        Schema::create('projet_techno', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger("ordre")->unsigned()->default(1);
            $table->integer("projet_id")->unsigned();
            $table->integer("techno_id")->unsigned();

            $table->foreign("projet_id")
                ->references('id')
                ->on("projets")
                ->onDelete("cascade");

            $table->foreign("techno_id")
                ->references('id')
                ->on("technos")
                ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('projet_techno');
        Schema::drop('technos');
    }
}
