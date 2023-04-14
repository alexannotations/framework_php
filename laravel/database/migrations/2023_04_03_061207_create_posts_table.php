<?php
/* php artisan migrate:refresh --seed */
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            # observe el metodo para tipo y clausula

            $table->unsignedBigInteger('user_id');
            # relationships
            $table->foreign('user_id')->references('id')->on('users');
            
            # $table->foreign('user_id')->constrained();
            /* Estamos siguiendo la convención de user_id, 
            por lo que Laravel sabe que la tabla en relación 
            es users por el mismo nombre. 
            Si el campo fuera target_user_id solo se podrá usar 
            la primer opción; especificando la referencia y tabla. */

            $table->string('title');
            $table->string('slug')->unique();
            $table->text('body');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
