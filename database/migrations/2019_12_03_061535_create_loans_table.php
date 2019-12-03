<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('loaner_name');
            $table->integer('loaner_mobile');
            $table->string('loaner_email');
            $table->text('loaner_address');
            $table->integer('loan_amount');
            $table->string('loan_taken_date');
            $table->string('loan_end_date');
            $table->text('loan_detail');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('loans');
    }
}
