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
        Schema::create('media_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('table_name')->nullable();
            $table->integer('media_id')->unsigned()->nullable();
            $table->integer('row_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('media_id', 'media_model_media_id_foreign')
            ->references('id')->on('media')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('row_id', 'media_model_row_id_foreign_categories')
            ->references('id')->on('categories')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('row_id', 'media_model_row_id_foreign_users')
            ->references('id')->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_models');
    }
};
