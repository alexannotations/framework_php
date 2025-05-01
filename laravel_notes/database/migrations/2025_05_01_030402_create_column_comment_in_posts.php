<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColumnCommentInPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // despues de ejecutar el comando
            // php artisan make:migration create_column_comment_in_posts --table=posts
            // se agregan las lineas que modifican la tabla
            $table->text('comment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            // se eliminan las lineas que modifican la tabla
            $table->dropColumn('comment');
        });
    }
}
