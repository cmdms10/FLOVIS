<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('qty');
            $table->string('receiverName');
            $table->string('receiverkanaName');
            $table->string('firstZip');
            $table->string('lastZip');
            $table->string('region');
            $table->string('local');
            $table->string('addr');
            $table->string('tel');
            $table->string('receiverDate');
            $table->string('receiverTime');
            $table->text('remarks')->nullable();
            $table->timestamps();
//            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }
}
