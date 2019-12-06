<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('expense_title');
            $table->string('expense_date');
            $table->text('expense_detail')->nullable();
            $table->string('expense_total_amount');
<<<<<<< HEAD
            $table->string('expense_paid_amount');
=======
>>>>>>> de387a977b131a423ebcd20dceee7510d4390888
            $table->string('expense_due');
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
        Schema::dropIfExists('expenses');
    }
}
