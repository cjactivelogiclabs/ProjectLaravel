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
            $table->increments('id');
            $table->string('name');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('address'); 
            $table->integer('id_country')->unsigned();
            $table->index('id_country');     
            $table->foreign('id_country')
            ->references('id_countrie')->on('states')
            ->onDelete('cascade');
            $table->integer('id_state')->unsigned();
            $table->index('id_state');     
            $table->foreign('id_state')
            ->references('id')->on('states')
            ->onDelete('cascade');
            $table->string('city', 150);
            $table->string('zipcode', 5);           
            $table->string('phone');     
            $table->string('password');
            $table->integer('type')->default(0); // 0 = client, 1 = dashboard user
            $table->string('hear_about_us');
            $table->string('company_type');
            $table->string('interested_in');
            $table->string('programmer_using');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
