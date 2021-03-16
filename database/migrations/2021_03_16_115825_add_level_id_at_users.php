<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLevelIdAtUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // se crea esta migracion para agregar el campo nivel_id debajo del campo id
        // Y se hace un foreign key para tener las relaciones
        Schema::table("users", function (Blueprint $table) {
            $table->bigInteger("nivel_id")->unsigned()->nullable()->after("id");
            $table->foreign("nivel_id")->references("id")->on("nivels")
                ->onDelete("set null")
                ->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
