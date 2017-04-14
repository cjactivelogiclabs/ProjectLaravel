<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableInvoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_product_id')->unsigned();            
            $table->index('order_product_id');
            $table->foreign('order_product_id')
                  ->references('id')
                  ->on('order_products')
                  ->onDelete('cascade');                  
            $table->decimal('order_product_price',10,2);    
            $table->decimal('subtotal',10,2);    
            $table->decimal('taxes',10,2);    
            $table->decimal('total',10,2);                
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
        Schema::drop('invoices');
    }
}
