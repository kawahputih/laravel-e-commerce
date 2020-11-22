<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSysTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key_slug')->unique();
            $table->string('key_name');
            $table->longText('key_value');
            $table->integer('group')->default(0)->index();
            $table->integer('sort')->default(0)->index();
            $table->integer('type')->default(0)->index();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::create('sys_notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable()->index();
            $table->string('title')->index();
            $table->longText('body');
            $table->string('readed_at')->nullable()->index();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::create('ref_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index();
            $table->string('email')->index();
            $table->string('subject')->index();
            $table->longText('body');
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
        Schema::dropIfExists('sys_settings');
        Schema::dropIfExists('sys_notifications');
        Schema::dropIfExists('ref_messages');
    }
}
