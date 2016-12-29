<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BundleCustomers extends Migration
{
	
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function(Blueprint $table) {
            $table->engine = 'MyISAM';
			$table->increments('id');
			$table->string('first_name', 64);
			$table->string('last_name', 64);
			$table->string('email', 64)
				->unique();
			$table->char('password', 64)
				->nullable();
			$table->string('avatar', 255)
				->nullable();
			$table->string('fbuid', 64)
				->nullable();
			$table->enum('status', ['active', 'pending', 'blocked'])
				->nullable()
				->default('active');
			$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::drop('customers');
    }
}
