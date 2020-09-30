<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });

        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('picture');
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('departments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dept_name');
            $table->timestamps();
        });

        Schema::create('genders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('gender_name');
            $table->timestamps();
        });

        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->mediumText('address');
            
            /**
             *  if we need add a foreign key constraint then
             *  the column should be unsigned integer
             */            
            $table->date('join_date');
            $table->date('birth_date');
            $table->integer('dept_id')->unsigned();
            $table->integer('gender_id')->unsigned();
            $table->integer('age');
            $table->string('picture');

            /**
             *  Add foreign key constraints to these columns
             */
            $table->foreign('dept_id')->references('id')->on('departments');
            $table->foreign('gender_id')->references('id')->on('genders');
            $table->timestamps();
            
            /**
             *  Add Soft Deletes.
             * 
             *  it just mean that if we are deleting a row, then
             *  it will not delete row. it will just add a value to
             *  deleted_at column.
             */
            $table->softDeletes();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
        Schema::dropIfExists('users');
        Schema::dropIfExists('admins');
        Schema::dropIfExists('departments');
        Schema::dropIfExists('genders');
        Schema::dropIfExists('password_resets');
        Schema::dropIfExists('users');
    }
}
