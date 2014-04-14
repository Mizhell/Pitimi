<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCongregationsTable extends BaseMigration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('congregations', function($table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('address', 200);
            $table->integer('pm_day_of_week');  // Starting on Sunday as 0 to Saturday as 6.
            $table->datetime('pm_datetime');
            $table->integer('cbs_day_of_week'); // Starting on Sunday as 0 to Saturday as 6.
            $table->datetime('cbs_datetime');
            $table->boolean('is_group');
        });

        $this->addCommonsTo('congregations');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('congregations');
	}

}
