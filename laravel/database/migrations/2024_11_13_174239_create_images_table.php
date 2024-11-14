<?php
/**
 * Tabla con relacion polimorfica
 * La cual se puede relacionar con user o con post
 */

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
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            // clave con la que se va a relacionar el valor, convencion de nombre ...able_id    postable_id
            $table->unsignedBigInteger('imageable_id');
            // para saber con que elemento se va a relacionar
            $table->string('imageable_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
