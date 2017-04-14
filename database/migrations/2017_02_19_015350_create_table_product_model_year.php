<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProduct_model_year extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_model_years', function (Blueprint $table) { 
            $table->increments('id');
            $table->integer('id_product')->unsigned();                        
            $table->index('id_product');
            $table->foreign('id_product')
                  ->references('id')
                  ->on('products')
                  ->onDelete('cascade');
            $table->integer('id_maker')->unsigned();                        
            $table->index('id_maker');
            $table->foreign('id_maker')
                  ->references('id')
                  ->on('makers')
                  ->onDelete('cascade');                                        
            $table->integer('id_model')->unsigned();                        
            $table->index('id_model');
            $table->foreign('id_model')
                  ->references('id')
                  ->on('models')
                  ->onDelete('cascade');   
            $table->integer('year')->unsigned();                        
            $table->index('year');
            $table->integer('status')->default(0);
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
        Schema::drop('product_model_years');
    }
}
