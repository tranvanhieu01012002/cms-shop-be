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
        Schema::create('order_statuses', function (Blueprint $table) {
            $table->increments('id'); // auto increment
            $table->integer('order_id')->unsigned()->nullable(); // nullable
            $table->string('status')->nullable(); // nullable
            $table->text('description')->nullable(); // nullable
            $table->timestamps(); // auto add timestamps
            $table->foreign('order_id')
            ->references('id')
            ->on('orders')
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
        Schema::dropIfExists('order_statuses');
    }
};
