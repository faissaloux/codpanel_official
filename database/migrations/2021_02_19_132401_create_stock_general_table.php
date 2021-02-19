<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockGeneralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_general', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ProductID', 255)->nullable()->default(null);
            $table->string('sortie', 255)->nullable()->default(null);
            $table->string('Entree', 255)->nullable()->default(null);

            $table->timestamps();
		    $table->time('deleted_at')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_general');
    }
}
