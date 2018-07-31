<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->increments('id_store');
            $table->integer('id_user');
            $table->integer('id_typestore');
            $table->integer('status')->default(0);
            $table->string('namestore');
            $table->string('detail');
            $table->string('address');
            $table->string('timeopen');
            $table->string('timeclose');
            $table->string('profilestore');
            $table->double('lat',20,10);
            $table->double('lng',20,10);
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
        Schema::dropIfExists('stores');
    }
}
