<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name');
            $table->integer('category_id');
            $table->integer('supplier_id');
            $table->integer('warehouse_id')->nullable();
            $table->integer('product_qty');
            $table->decimal('supplier_price');
            $table->decimal('sell_price');
            $table->string('mfg_date')->nullable();
            $table->string('exp_date')->nullable();
            $table->string('model')->nullable();
            $table->string('image')->nullable();
            $table->text('product_detail')->nullable();
            $table->string('sku');
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('products');
    }
}
