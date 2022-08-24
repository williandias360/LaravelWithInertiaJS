<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('Cidade', function (Blueprint $table) {
            $table->id("CodigoCidade");
            $table->integer("CodigoEstado");
            $table->foreign("CodigoEstado")->references("CodigoEstado")->on("Estado");
            $table->string("Nome", 90);
            $table->string("CodigoIbge", 12);
            $table->dateTime("DataCriacao")->default(DB::raw("CURRENT_TIMESTAMP"));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Cidade');
    }
};
