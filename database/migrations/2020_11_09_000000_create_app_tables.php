<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('cities', function(Blueprint $table) {
		
		    $table->bigIncrements('id');
		    $table->string('name', 255);
		    $table->string('provider_id', 255);
		    $table->string('reference', 255);
		
		    $table->timestamps();
		
		});

		Schema::create('items', function(Blueprint $table) {
		
		    $table->bigIncrements('id');
		    $table->string('list_id', 255);
		    $table->string('product_id', 255);
		    $table->string('price', 255)->default('0');
		    $table->string('quantity', 255)->default('0');
		    $table->time('deleted_at')->nullable();
		
		    $table->timestamps();
		
		});

		Schema::create('lists', function(Blueprint $table) {
		
		    $table->bigIncrements('id');
		    $table->string('name', 255)->nullable();
		    $table->string('adress', 255)->nullable();
		    $table->text('note')->nullable();
		    $table->string('phone', 255)->nullable();
		    $table->string('source', 255)->nullable();
		    $table->string('provider_id', 255)->nullable();
		    $table->string('employee_id', 255)->nullable();
		    $table->string('handler', 255)->default('employee');
		    $table->string('city_id', 255)->nullable();
		    $table->string('laivraison', 255)->nullable();
		    $table->text('cancel_reason')->nullable();
		    $table->text('history')->nullable();
		    $table->string('product', 255)->nullable();
		    $table->string('city', 255)->nullable();
		    $table->string('quantity', 255)->nullable();
		    $table->string('price', 255)->nullable();
			$table->enum('status', ['new', 'confirmed', 'recall', 'unanswered', 'delivred', 'canceled'])->default('new');
		    $table->time('unanswered_at')->nullable();
		    $table->time('accepted_at')->nullable();
		    $table->time('verified_at')->nullable();
		    $table->time('delivred_at')->nullable();
		    $table->time('deleted_at')->nullable();
		    $table->time('canceled_at')->nullable();
		    $table->time('duplicated_at')->nullable();
		    $table->time('checked_at')->nullable();
		    $table->time('recall_at')->nullable();
		
		    $table->timestamps();
		
		});

		Schema::create('products', function(Blueprint $table) {
		
		    $table->bigIncrements('id');
		    $table->string('image', 255)->nullable();
		    $table->string('name', 255)->nullable();
		    $table->string('price', 255)->default('0');
		    $table->string('prix_jmla', 255)->default('0');
		    $table->string('reference', 255)->nullable();
		    $table->time('deleted_at')->nullable();
		
		    $table->timestamps();
		
		});

		Schema::create('users', function(Blueprint $table) {
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
		Schema::drop('users');
		Schema::drop('products');
		Schema::drop('payments');
		Schema::drop('lists');
		Schema::drop('items');
		Schema::drop('cities');

    }
}
