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
        Schema::create('produto', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->default('');
            $table->string('sku')->default('');
            $table->bigInteger('unidade_medida_id')->index();
            $table->decimal('valor');
            $table->bigInteger('quantidade');
            $table->bigInteger('categoria_id')->index();
            $table->string('imagem')->default('');
            $table->timestamps();
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
