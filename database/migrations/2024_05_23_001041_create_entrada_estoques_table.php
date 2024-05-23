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
        Schema::create('entradas_estoque', function (Blueprint $table) {
            $table->id('entradas_estoque_id');
            $table->integer('entradas_estoque_quantidade')->nullable();
            $table->date('entradas_estoque_data_entrada')->nullable();
            $table->text('entradas_estoque_observacao')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('produto_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('produto_id')->references('produto_id')->on('produtos');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entradas_estoque');
    }
};
