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
            $table->integer('division_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->integer('district_id')->unsigned();
            $table->integer('ward_id')->unsigned();
            $table->integer('gender_id')->unsigned();
            $table->integer('age');
            $table->string('picture');

            /**
             *  Add foreign key constraints to these columns
             */
            $table->foreign('dept_id')->references('id')->on('departments');            
            $table->foreign('division_id')->references('id')->on('divisions');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('district_id')->references('id')->on('districts');
            $table->foreign('ward_id')->references('id')->on('wards');
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

        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('city_name');
            $table->integer('zip_code');
            $table->timestamps();
        });

        Schema::create('districts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('district_name');
            $table->timestamps();
        });

        Schema::create('wards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ward_name');
            $table->timestamps();
        });

        Schema::create('departments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dept_name');
            $table->timestamps();
        });
        
        Schema::create('divisions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('division_name');
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
        Schema::dropIfExists('cities');
        Schema::dropIfExists('districts');
        Schema::dropIfExists('wards');
        Schema::dropIfExists('departments');
        Schema::dropIfExists('divisions');
        Schema::dropIfExists('genders');
        Schema::dropIfExists('password_resets');
        Schema::dropIfExists('users');
    }
}
