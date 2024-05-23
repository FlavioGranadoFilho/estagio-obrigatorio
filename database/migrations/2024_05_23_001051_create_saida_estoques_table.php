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
        Schema::create('saidas_estoque', function (Blueprint $table) {
            $table->id('saidas_estoque_id');
            $table->integer('saidas_estoque_quantidade')->nullable();
            $table->date('saidas_estoque_data_saida')->nullable();
            $table->text('saidas_estoque_observacao')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('produto_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saidas_estoque');
    }
};
