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
			$table->string('sku', 32);
			$table->string('title', 128);
			$table->string('description', 255)
					->nullable();
			$table->string('image', 128)
					->nullable();
			$table->decimal('price', 10, 2)
					->nullable();
			$table->integer('likes')
					->nullable()
					->default(0);
			$table->enum('status', ['enabled', 'disabled'])
				->default('enabled');
			$table->timestamps();
			
			$table->index('sku');
			$table->unique('sku');
			
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
