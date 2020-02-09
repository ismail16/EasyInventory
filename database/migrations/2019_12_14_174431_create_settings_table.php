<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('store_name');
            $table->string('store_logo')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('owner_image')->nullable();
            $table->string('store_mobile')->nullable();
            $table->string('store_email')->nullable();
            $table->string('store_website')->nullable();
            $table->string('store_currency')->nullable();
            $table->string('navbar_color')->nullable();
            $table->string('sidebar_color')->nullable();
            $table->string('text_size')->nullable();
            $table->text('store_address')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
