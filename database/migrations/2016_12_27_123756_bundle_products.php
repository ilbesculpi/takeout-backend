<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BundleProducts extends Migration
{
	
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('products', function(Blueprint $table) {
			$table->engine = 'MyISAM';
			$table->increments('id');
			$table->string('title', 128);
			$table->string('description', 255)
					->nullable();
			$table->decimal('price', 10, 2)
					->nullable();
			$table->enum('status', ['enabled', 'disabled'])
				->default('enabled');
		});
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
