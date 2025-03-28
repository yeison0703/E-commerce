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

     

        Schema::create('producto', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('descripcion');
            $table->integer('precio');
            $table->integer('stock');
            $table->string('categoria');
            $table->string('imagen(ruta)');
            $table->date('fecha creacion');
            $table->date('fecha actualizacion');
            
        });

        Schema::create('Categoria', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion');
            $table->date('fecha creacion');
            $table->date('fecha actualizacion');
            
        });

  



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto');
        Schema::dropIfExists('Categoria');
    }
};
