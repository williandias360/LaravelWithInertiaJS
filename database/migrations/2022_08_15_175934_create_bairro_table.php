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
        Schema::create('Bairro', function (Blueprint $table) {
            $table->id("CodigoBairro");
            $table->string("Nome", 120);
            $table->dateTime("DataCriacao")->default(DB::raw("CURRENT_TIMESTAMP"));
            $table->dateTime("DataModificacao")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Bairro');
    }
};
