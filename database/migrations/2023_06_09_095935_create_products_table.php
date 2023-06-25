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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id'); // auto increment
            $table->string('name')->nullable(); // nullable
            $table->text('description')->nullable(); // nullable
            $table->string('slug')->nullable(); // nullable
            $table->string('sku')->nullable(); // nullable
            $table->string('barcode')->nullable(); // nullable
            $table->integer('stock')->nullable(); // nullable
            $table->integer('price')->nullable(); // nullable
            $table->string('status')->nullable(); // nullable
            $table->double('discount', 10, 2)->nullable(); // nullable
            $table->double('tax_fee', 10, 2)->nullable(); 
            $table->integer('discount_id')->nullable(); // nullable
            $table->integer('tax_id')->nullable(); // nullable// nullable
            $table->timestamps(); // auto add timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
