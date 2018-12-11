<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->smallInteger('user_type')->default(1);
            $table->string('first_name', 25);
            $table->string('last_name', 25);
            $table->string('email_address', 30)->unique();
            $table->string('phone_number', 10);
            $table->string('password', 200);
            $table->dateTime('updated_at');
            $table->dateTime('created_at');
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
