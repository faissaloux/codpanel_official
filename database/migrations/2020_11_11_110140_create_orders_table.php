<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->engine = 'InnoDB';
		
		    $table->bigIncrements('id');
            $table->enum('status', ['new', 'confirmed', 'recall', 'unanswered', 'canceled'])->default('new');
		    $table->integer('user_id');
		    $table->string('currency', 255)->default(null);
		    $table->string('payment_id', 255)->nullable();
		    $table->string('serial', 255)->default(null);
		    $table->string('device', 255)->default(null);
		    $table->string('ip', 255)->default(null);
		    $table->string('country', 255)->default(null);
            
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
        Schema::dropIfExists('orders');
    }
}
