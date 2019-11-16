<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplierInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('supplier_id');
            $table->tinyInteger('warehouse_id');
            $table->string('datepicker_invoice_exp');
            $table->string('image');
            $table->string('product_name');
            $table->string('product_quantity');
            $table->string('product_rate');
            $table->string('total_price');
            $table->string('grand_total_price');
            $table->string('paid_amount');
            $table->string('due_amount');
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
        Schema::dropIfExists('supplier_invoices');
    }
}
