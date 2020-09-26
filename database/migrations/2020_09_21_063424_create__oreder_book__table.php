<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrederBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderbooks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('bookid')->unsigned();
            $table->bigInteger('orderid')->unsigned();
            $table->timestamps();
        });

        Schema::table('orderbooks', function($table) {
            $table->foreign('bookid')->references('id')->on('books')->onDelete('cascade');;

            $table->foreign('orderid')->references('id')->on('orders')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('OrderBooks');
    }
}
