<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image', 255)->nullable();
            $table->string('name', 255);
            $table->string('full_name', 255)->nullable();
            $table->string('email', 255);
            $table->string('password', 255);
            $table->string('phone', 255)->nullable();
            $table->string('deliver_price', 255)->nullable();
            $table->time('deleted_at')->nullable();
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
        Schema::dropIfExists('providers');
    }
}
