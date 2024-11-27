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
        // alteramos la tabla notes
        Schema::table('notes',function(Blueprint $table){
            // agregar nueva columna
            $table->string('author');
            // eliminar columna
            $table->dropColumn(['deadline']);
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // elimina la columna creada en esta migracion
        Schema::dropColumns('notes',['author']);
        // pero no se esta restaurando la columna eliminada en esta migracion
    }
};
