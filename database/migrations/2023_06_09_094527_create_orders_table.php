<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id'); // auto increment
            $table->integer('user_id')->unsigned()->nullable(); // nullable
            $table->double('subtotal', 10, 2)->nullable(); // nullable
            $table->integer('payment_id')->nullable(); // nullable
            $table->string('status')->nullable(); // nullable
            $table->double('vat', 10, 2)->nullable(); // nullable
            $table->double('shipping_fee', 10, 2)->nullable(); // nullable
            $table->timestamps(); // auto add timestamps
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade') // delete cascade
            ->onUpdate('cascade') // update cascade
            ->nullable(); // nullable
            });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
