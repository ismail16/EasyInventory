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
            $table->string('supplier_id');
            $table->string('warehouse_id')->nullable();
            $table->string('datepicker_invoice_exp');
            $table->string('image')->nullable();
            $table->text('product_name');
            $table->text('product_quantity');
            $table->text('product_rate');
            $table->text('total_price');
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
