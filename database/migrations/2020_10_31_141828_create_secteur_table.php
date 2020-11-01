<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSecteurTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('secteur', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('numero', 10);
			$table->string('nom_secteur', 50);
			$table->string('adresse');
			$table->string('responsable', 50);
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('secteur');
	}

}
