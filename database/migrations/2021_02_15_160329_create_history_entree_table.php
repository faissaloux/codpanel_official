<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryEntreeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_entree', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('productID', 255)->nullable()->default(null);
            $table->string('quantity', 255)->nullable()->default(null);
            $table->string('valid', 255)->nullable()->default(null);
            $table->text('note', 255)->nullable()->default(null);
            
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
        Schema::dropIfExists('history_entree');
    }
}
