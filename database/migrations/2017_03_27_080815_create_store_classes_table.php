<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoreClassesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_classes', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name');
            $table->string('desc');
            $table->integer('weigh', false);
            $table->integer('total_num', false);
            $table->timestamp('deleted_at');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('store_classes');
    }
}
