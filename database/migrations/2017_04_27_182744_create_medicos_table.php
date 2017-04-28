<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('medicos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('email');
            $table->string('crm');
            $table->string('username');
            $table->string('senha');
            $table->string('endereco');
            $table->string('cep');
            $table->string('cidade');
            $table->string('estado');
            $table->string('telefone');
            $table->string('latitude');
            $table->string('longitude');
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
		Schema::drop('medicos');
	}

}
