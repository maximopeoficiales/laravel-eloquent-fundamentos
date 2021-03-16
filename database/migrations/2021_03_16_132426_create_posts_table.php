<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
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
            $table->string("name");

            // un posts tiene un categoria
            $table->bigInteger("category_id")->unsigned();
            // un post fue creado por un usuario 
            $table->bigInteger("user_id")->unsigned();

            // relaciones
            $table->foreign("category_id")->references("id")->on("categories")
                ->onDelete("cascade")
                ->onUpdate("cascade");

            $table->foreign("user_id")->references("id")->on("users")
                ->onDelete("cascade")
                ->onUpdate("cascade");

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
}
