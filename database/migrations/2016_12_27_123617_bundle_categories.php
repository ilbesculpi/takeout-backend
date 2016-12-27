<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BundleCategories extends Migration
{
	
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function(Blueprint $table) {
			$table->engine = 'MyISAM';
			$table->increments('id');
			$table->string('name', 64);
			$table->string('description', 255)
					->nullable();
			$table->integer('parent_id')
					->unsigned()
					->nullable();
			$table->smallInteger('level')
					->unsigned()
					->nullable();
			$table->enum('status', ['enabled', 'disabled'])
				->default('enabled');
			
			$table->foreign('parent_id')
					->references('id')
					->on('categories');
		});
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::drop('categories');
    }
}
