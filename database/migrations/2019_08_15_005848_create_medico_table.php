<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMedicoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('medico', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nome', 45);
			$table->date('data_nascimento');
			$table->string('crm', 45);
			$table->integer('area_id')->index('medico_fk_area_idx');
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
		Schema::drop('medico');
	}

}
