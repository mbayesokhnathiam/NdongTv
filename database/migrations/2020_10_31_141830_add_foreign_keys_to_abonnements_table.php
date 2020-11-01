<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAbonnementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('abonnements', function(Blueprint $table)
		{
			$table->foreign('abonnes_id', 'abonnements_ibfk_1')->references('id')->on('abonnes')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('amplie_id', 'abonnements_ibfk_2')->references('id')->on('amplies')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('abonnements', function(Blueprint $table)
		{
			$table->dropForeign('abonnements_ibfk_1');
			$table->dropForeign('abonnements_ibfk_2');
		});
	}

}
