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
        Schema::create('Pessoa', function (Blueprint $table) {
            $table->id("CodigoPessoa");
            $table->string("Nome", 255);
            $table->boolean("PerfilCliente")->default(false);
            $table->boolean("PerfilEmpresa")->default(false);
            $table->boolean("PerfilUsuario")->default(false);
            $table->boolean("PerfilFornecedor")->default(false);
            $table->longText("Observacao")->nullable();
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
        Schema::dropIfExists('pessoa');
    }
};
