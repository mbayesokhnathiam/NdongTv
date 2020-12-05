<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLignePaiementTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ligne_paiement', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('abonnement_id')->unsigned()->index('abonnement_id');
			$table->integer('paiement_mensuel_id')->unsigned()->index('paiement_mensuel_id');
			$table->integer('montant_verse')->nullable()->default(0);;
			$table->integer('montant_restant')->nullable()->default(0);;
			$table->boolean('status')->default(false);
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
		Schema::drop('ligne_paiement');
	}

}
