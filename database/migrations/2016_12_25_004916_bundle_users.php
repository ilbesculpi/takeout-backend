<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BundleUsers extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('users', function(Blueprint $table) {
			$table->engine = 'MyISAM';
			$table->increments('id');
			$table->string('name', 64);
			$table->string('email', 64)
				->unique();
			$table->char('password', 64)
				->nullable();
			$table->string('avatar', 255)
				->nullable();
			$table->enum('role', ['admin', 'guest'])
				->nullable()
				->default('guest');
			$table->timestamp('last_login')
				->nullable();
			$table->smallInteger('login_attempts')
				->nullable()
				->default(0);
			$table->enum('status', ['active', 'pending', 'blocked'])
				->nullable()
				->default('active');
			$table->rememberToken();
			$table->char('activation_token', 64)
				->nullable();
			$table->timestamps();
		});
		
		Schema::create('password_resets', function (Blueprint $table) {
			$table->engine = 'MyISAM';
            $table->string('email')->index();
            $table->string('token')->index();
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
		Schema::drop('password_resets');
        Schema::drop('users');
    }
}
