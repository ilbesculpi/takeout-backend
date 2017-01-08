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
		$this->create_table_categories();
        $this->create_table_products();
		$this->create_table_products_categories();
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
		Schema::drop('products_categories');
        Schema::drop('products');
		Schema::drop('categories');
    }
	
	
	protected function create_table_categories()
	{
		Schema::create('categories', function(Blueprint $table) {
			$table->engine = 'MyISAM';
			$table->increments('id');
			$table->string('name', 64);
			$table->string('slug', 64)
					->nullable();
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
			$table->softDeletes();
			// indexes & foreign keys
			$table->foreign('parent_id')
					->references('id')
					->on('categories');
		});
	}
	
	protected function create_table_products()
	{
		Schema::create('products', function(Blueprint $table) {
			$table->engine = 'MyISAM';
			$table->increments('id');
			$table->string('sku', 32);
			$table->string('title', 128);
			$table->string('slug', 128)
					->nullable();
			$table->string('description', 255)
					->nullable();
			$table->string('image', 255)
					->nullable();
			$table->decimal('price', 10, 2)
					->nullable();
			$table->smallInteger('stock_quantity')
					->unsigned()
					->nullable()
					->default(0);
			$table->integer('likes')
					->nullable()
					->default(0);
			$table->enum('status', ['enabled', 'disabled'])
				->default('enabled');
			$table->timestamps();
			$table->softDeletes();
			// indexes & foreign keys
			$table->index('sku');
			$table->unique('sku');
		});
	}
	
	protected function create_table_products_categories()
	{
		Schema::create('products_categories', function(Blueprint $table) {
			$table->engine = 'MyISAM';
			$table->integer('product_id')
					->unsigned();
			$table->integer('category_id')
					->unsigned();
			// indexes & foreign keys
			$table->foreign('product_id')
					->references('id')
					->on('products');
			$table->foreign('category_id')
					->references('id')
					->on('categories');
		});
	}
	
    
}
