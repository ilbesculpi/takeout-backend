<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BundleOrders extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        $this->create_table_orders();
		$this->create_table_order_products();
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
		Schema::drop('orders_products');
        Schema::drop('orders');
    }
	
	
	protected function create_table_orders()
	{
		Schema::create('orders', function(Blueprint $table) {
			$table->engine = 'MyISAM';
			$table->increments('id');
			$table->string('custom_order_id', 32)
					->nullable();
			$table->integer('customer_id')
					->unsigned();
			$table->string('billing', 255)
					->nullable();
			$table->string('shipping', 255)
					->nullable();
			$table->string('image', 255)
					->nullable();
			$table->decimal('total', 10, 2)
					->nullable();
			$table->enum('status', ['open', 'processing', 'complete', 'canceled'])
				->default('open');
			$table->timestamps();
			// indexes & foreign keys
			$table->index('custom_order_id');
			$table->foreign('customer_id')
					->references('id')
					->on('customers');
		});
	}
	
	protected function create_table_order_products()
	{
		Schema::create('orders_products', function(Blueprint $table) {
			$table->engine = 'MyISAM';
			$table->integer('order_id')
					->unsigned();
			$table->integer('product_id')
					->unsigned();
			$table->smallInteger('quantity')
					->unsigned()
					->default(0);
			$table->decimal('unit_price', 10, 2)
					->default(0);
			$table->decimal('subtotal', 10, 2)
					->default(0);
			// indexes & foreign keys
			$table->foreign('order_id')
					->references('id')
					->on('orders');
			$table->foreign('product_id')
					->references('id')
					->on('products');
		});
	}
	
}
