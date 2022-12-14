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
        Schema::create('shopping_carts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('item_id');
            $table->foreign('item_id')
            ->references('id')->on('items')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('item_size_stock_id');
            $table->foreign('item_size_stock_id')
            ->references('id')->on('item_size_stocks')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->integer('jumlah');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shopping_carts');
    }
};
