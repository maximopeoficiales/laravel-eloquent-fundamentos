<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string("name");

            // un video tiene un categoria
            $table->bigInteger("category_id")->unsigned();
            // un video fue creado por un usuario 
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
        Schema::dropIfExists('videos');
    }
}
