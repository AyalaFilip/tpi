<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReseniasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resenias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('contenido');
            $table->integer('valoracion');

            $table->integer('sitio_id')->unsigned();
            $table->foreign('sitio_id')->references('id')->on('sitios');

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
        Schema::dropIfExists('resenias');
    }
}
