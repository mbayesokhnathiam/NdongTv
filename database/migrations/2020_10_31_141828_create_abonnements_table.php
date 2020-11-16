<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbonnementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('abonnements', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('numero', 20);
			$table->integer('nb_tv');
			$table->integer('montant');
			$table->integer('reduction')->default(0)->nullable();
            $table->integer('prix_tv');
            $table->integer('secteur_id');
			$table->integer('amplie_id')->unsigned()->index('amplie_id');
			$table->boolean('status')->default(1);
			$table->integer('abonnes_id')->unsigned()->index('abonnes_id');
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
		Schema::drop('abonnements');
	}

}
