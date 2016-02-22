<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projets', function (Blueprint $table) {
            $table->increments('id');
            $table->string("titre");
            $table->string("soustitre");
            $table->text("texte");
            $table->string("slug")->unique();
            $table->string("url")->nullable();
            $table->tinyInteger("etat")->unsigned()->default(1);
            $table->tinyInteger("ordre")->unsigned()->default(1);
            $table->boolean("is_open_source")->default(false);

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
        Schema::drop('projets');
    }
}
