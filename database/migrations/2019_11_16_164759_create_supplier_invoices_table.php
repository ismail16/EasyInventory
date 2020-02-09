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
            $table->string('invoice_no');
            $table->string('supplier_id');
            $table->string('warehouse_id')->nullable();
            $table->string('invoice_date');
            $table->string('image')->nullable();
            $table->string('grand_total_price');
            $table->string('paid_amount');
            $table->string('due_amount');
            $table->string('discount')->nullable();
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
