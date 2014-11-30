<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable1 extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('users', function($t) {
                $t->increments('id');
                $t->string('username', 16);
                $t->string('password', 64);
                $t->timestamps();
        });
          Schema::create('user_details', function($t) {
                $t->increments('user_id')->unsigned();
                $t->foreign('user_id')->references('id')->on('users');
                $t->string('email', 64);
                $t->string('name', 64);
                $t->string('phone', 64);
                $t->string('adres', 64);
        });
		 Schema::create('groups', function($t) {
		 		$t->increments('id');
                $t->string('group_name', 64);
                $t->timestamps();
        });
		 Schema::create('user_groups', function($t){
		 		$t->increments('id');
 				$t->integer('user_id')->unsigned();
                $t->foreign('user_id')->references('id')->on('users');
				$t->integer('group_id')->unsigned();
                $t->foreign('group_id')->references('id')->on('groups');
		});
}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_details');
		Schema::drop('user_groups');
		Schema::drop('users');
		Schema::drop('groups');
	}

}
