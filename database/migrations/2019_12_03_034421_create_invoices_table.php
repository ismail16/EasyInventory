<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
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
            $table->string('invoice_no');
            $table->string('customer_id');
            $table->string('supplier_id');
            $table->string('warehouse_id')->nullable();
            $table->string('invoice_date');
            $table->string('image')->nullable();
            $table->decimal('grand_total_price');
            $table->decimal('paid_amount');
            $table->decimal('due_amount');
            $table->decimal('discount')->nullable();
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
        Schema::dropIfExists('invoices');
    }
}
