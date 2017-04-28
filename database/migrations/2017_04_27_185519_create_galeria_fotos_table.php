<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGaleriaFotosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('galeria_fotos', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('galeria_id')->unsigned();
            $table->foreign('galeria_id')->references('id')->on('galerias');
            $table->integer('foto_id')->unsigned();
            $table->foreign('foto_id')->references('id')->on('fotos');
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
		Schema::drop('galeria_fotos');
	}

}
