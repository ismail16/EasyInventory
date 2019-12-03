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
            $table->string('loaner_email')->nullable();
            $table->text('loaner_address')->nullable();
            $table->integer('loan_amount');
            $table->string('loan_taken_date')->nullable();
            $table->string('loan_end_date')->nullable();
            $table->text('loan_detail')->nullable();
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
        Schema::dropIfExists('loans');
    }
}
