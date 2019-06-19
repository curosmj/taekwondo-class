<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_item', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id')->nullable();
            $table->unsignedInteger('invoice_id');
            $table->unsignedInteger('service_id')->nullable();
            $table->double('quantity', 8, 2);
            $table->foreign('invoice_id')->references('id')->on('invoice');
            $table->foreign('product_id')->references('id')->on('product');
            $table->foreign('service_id')->references('id')->on('service');
            $table->unique(['product_id', 'invoice_id', 'service_id']);
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
        Schema::dropIfExists('invoice_item');
    }
}
