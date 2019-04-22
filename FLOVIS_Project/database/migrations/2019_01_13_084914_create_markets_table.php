<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('markets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('mail');
            $table->string('phone');
//            $table->text('tag');
            $table->string('url')->nullable();
            $table->integer('zipcode');
            $table->string('address1');
            $table->string('address2');
            $table->string('address3');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('first_kanasei');
            $table->string('last_kanamei');
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
        Schema::drop('markets');
    }
}
