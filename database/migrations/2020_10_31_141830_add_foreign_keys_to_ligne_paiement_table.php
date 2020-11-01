<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToLignePaiementTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ligne_paiement', function(Blueprint $table)
		{
			$table->foreign('abonnement_id', 'ligne_paiement_ibfk_1')->references('id')->on('abonnements')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('paiement_mensuel_id', 'ligne_paiement_ibfk_2')->references('id')->on('paiement_mensuel')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('ligne_paiement', function(Blueprint $table)
		{
			$table->dropForeign('ligne_paiement_ibfk_1');
			$table->dropForeign('ligne_paiement_ibfk_2');
		});
	}

}
