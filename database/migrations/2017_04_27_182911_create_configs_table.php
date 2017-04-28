<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('configs', function(Blueprint $table) {
            $table->increments('id');
            $table->string('endereco');
            $table->string('cep');
            $table->string('fone');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('youtube');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('fone1');
            $table->string('fone2');
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
		Schema::drop('configs');
	}

}
