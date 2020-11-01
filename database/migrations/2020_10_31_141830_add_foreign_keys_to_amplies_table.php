<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAmpliesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('amplies', function(Blueprint $table)
		{
			$table->foreign('secteur_id', 'amplies_ibfk_1')->references('id')->on('secteur')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('amplies', function(Blueprint $table)
		{
			$table->dropForeign('amplies_ibfk_1');
		});
	}

}
