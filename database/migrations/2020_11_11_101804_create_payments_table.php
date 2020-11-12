<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->engine = 'InnoDB';
		
		    $table->integer('id');
		    $table->string('order_id', 255)->default(null);
		    $table->string('method', 255)->default(null);
            $table->string('transactionID', 255)->default(null);
            $table->string('amount', 255);
		    $table->time('deleted_at')->nullable()->default(null);
		
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
        Schema::dropIfExists('payments');
    }
}
