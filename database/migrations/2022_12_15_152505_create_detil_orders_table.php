<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detil_orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('id_order');
            $table->foreign('id_order')
            ->references('id')->on('orders')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('id_stocksize');
            $table->foreign('id_stocksize')
            ->references('id')->on('item_size_stocks')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->dateTime("transaction_time");
            $table->integer('price_bought');
            $table->integer('total_items');
            $table->integer('total_price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detil_orders');
    }
};
