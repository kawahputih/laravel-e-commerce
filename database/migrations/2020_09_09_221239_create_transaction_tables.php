<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trx_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->char('invoice_number', 16)->nullable()->index();
            $table->char('tracking_number', 8)->nullable()->index();
            $table->unsignedInteger('supplier_id')->nullable()->index();
            $table->unsignedInteger('customer_id')->nullable()->index(); // user_id role customers / user
            $table->string('ship_name')->nullable()->index();
            $table->longText('ship_address1')->nullable()->index();
            $table->longText('ship_address2')->nullable()->index();
            $table->string('city')->nullable()->index();
            $table->string('state')->nullable()->index();
            $table->string('zip')->nullable()->index();
            $table->string('email')->nullable()->index();
            $table->string('country_code')->nullable()->index();
            $table->string('phone')->nullable()->index();
            $table->string('fax')->nullable()->index();
            $table->tinyInteger('is_shipped')->default(0)->index();
            $table->integer('total_items')->default(0)->index();
            $table->double('amount', 20, 2)->default(0)->index();
            $table->double('shipping', 20, 2)->default(0)->index();
            $table->decimal('discount')->default(0)->index();
            $table->decimal('tax')->default(0)->index();
            $table->double('grand_total', 20, 2)->default(0)->index();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::create('trx_order_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('order_id')->index();
            $table->unsignedInteger('product_id')->index();
            $table->string('name')->nullable()->index();
            $table->string('sku')->nullable()->index();
            $table->double('price', 20, 2)->default(0)->index();
            $table->integer('quantity')->default(0)->index();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trx_orders');
        Schema::dropIfExists('trx_order_details');
    }
}
