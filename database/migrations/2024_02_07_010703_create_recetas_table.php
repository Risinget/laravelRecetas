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

        Schema::create('categoria_recetas', function(Blueprint $table){
            $table->id();
            $table->string('nombre');
            $table->timestamps();


        });

        Schema::create('recetas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('ingredientes');
            $table->text('preparacion');
            $table->string('imagen');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('categoria_id')->references('id')->on('categoria_recetas');
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categoria_receta');

        Schema::dropIfExists('recetas');
    
    }
};
