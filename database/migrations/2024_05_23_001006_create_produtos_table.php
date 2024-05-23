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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id('produto_id');
            $table->string('produto_nome')->nullable();
            $table->text('produto_descricao')->nullable();
            $table->integer('produto_quantidade_estoque')->default(0);
            $table->timestamps();

            $table->unsignedBigInteger('categoria_id')->nullable();

            $table->foreign('categoria_id')->references('categoria_id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
