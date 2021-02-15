<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('CityID')->nullable()->default(null);
            $table->integer('stockTheorique')->nullable()->default(null);
            $table->integer('StockPhisique')->nullable()->default(null);
            $table->integer('stockEnCours')->nullable()->default(null);
            $table->string('Livre', 255)->nullable()->default(null);
            $table->integer('Recue')->nullable()->default(null);
            $table->integer('ProduitID')->nullable()->default(null);
            $table->string('User_id', 255)->nullable()->default(null);
            $table->string('stockRetour', 255)->nullable()->default(null);
            $table->string('stockVirtuel', 255)->nullable()->default(null);

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
        Schema::dropIfExists('stock');
    }
}
