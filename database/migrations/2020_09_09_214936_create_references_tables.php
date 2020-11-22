<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferencesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable()->index();
            $table->string('phone')->nullable()->index();
            $table->string('email')->nullable()->index();
            $table->string('website')->nullable()->index();
            $table->text('address')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::create('ref_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('parent_id')->nullable()->index();
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::create('ref_brands', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::create('ref_suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->string('name')->unique();
            $table->string('phone')->nullable()->index();
            $table->string('email')->nullable()->index();
            $table->string('website')->nullable()->index();
            $table->string('fax_number')->nullable()->index();
            $table->string('contact_person')->nullable()->index();
            $table->text('address')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::create('ref_option_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::create('ref_options', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('option_id')->index();
            $table->unsignedInteger('option_group_id')->index();
            $table->string('name')->nullable()->index();
            $table->engine = 'InnoDB';
        });

        Schema::create('ref_product_options', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id')->index();
            $table->unsignedInteger('option_id')->index();
            $table->unsignedInteger('option_group_id')->index();
            $table->double('option_price_increment', 20, 2)->default(0)->index();
            $table->engine = 'InnoDB';
        });

        Schema::create('ref_product_categories', function (Blueprint $table) {
            $table->unsignedInteger('product_id')->index();
            $table->unsignedInteger('category_id')->index();
            $table->primary(['product_id', 'category_id']);
            $table->engine = 'InnoDB';
        });

        Schema::create('ref_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sku')->unique();
            $table->string('name')->unique();
            $table->double('price', 20, 2)->default(0)->index();
            $table->double('weight', 20, 2)->default(0)->index();
            $table->text('cart_description')->nullable();
            $table->text('short_description')->nullable();
            $table->text('long_description')->nullable();
            $table->string('image_thumb')->nullable()->index();
            $table->longText('images')->nullable()->index(); // array serialize
            $table->integer('stock')->default(0)->index();
            $table->tinyInteger('live')->default(0)->index();
            $table->tinyInteger('unlimited')->default(0)->index();
            $table->text('location')->nullable();
            $table->unsignedInteger('warehouse_id')->nullable()->index();
            $table->softDeletes();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::create('ref_warehouses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->string('name')->unique();
            $table->string('phone')->nullable()->index();
            $table->string('email')->nullable()->index();
            $table->integer('capacity')->default(0)->index();
            $table->integer('stock')->default(0)->index();
            $table->longText('address')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('ref_contacts');
        Schema::dropIfExists('ref_categories');
        Schema::dropIfExists('ref_brands');
        Schema::dropIfExists('ref_suppliers');
        Schema::dropIfExists('ref_option_groups');
        Schema::dropIfExists('ref_options');
        Schema::dropIfExists('ref_product_options');
        Schema::dropIfExists('ref_product_categories');
        Schema::dropIfExists('ref_products');
        Schema::dropIfExists('ref_warehouses');
    }
}
