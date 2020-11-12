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
		
		    $table->integer('id');
		    $table->string('status', 255)->default(null);
		    $table->integer('user_id');
		    $table->string('address_id', 255)->default(null);
		    $table->string('total', 255)->default(null);
		    $table->string('store_id', 255)->default(null);
		    $table->string('shipping_id', 255)->default(null);
		    $table->string('currency', 255)->default(null);
		    $table->string('payment_id', 255)->default(null);
		    $table->string('subtotal', 255)->default(null);
		    $table->time('deleted_at')->nullable()->default(null);
		    $table->string('pickup', 255)->default(null);
		    $table->string('serial', 255)->default(null);
		    $table->string('device', 255)->default(null);
		    $table->string('ip', 255)->default(null);
		    $table->string('country', 255)->default(null);
		    $table->string('platform', 255)->default(null);
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
