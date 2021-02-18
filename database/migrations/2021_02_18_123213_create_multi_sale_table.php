<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMultiSaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multisale', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('listID', 255)->nullable()->default(null);
            $table->string('productID', 255)->nullable()->default(null);
            $table->string('price', 255)->nullable()->default(null);
            $table->string('quantity', 255)->nullable()->default(null);
            
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
        Schema::dropIfExists('multisale');
    }
}
