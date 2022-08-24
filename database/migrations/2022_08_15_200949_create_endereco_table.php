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
        Schema::create('Endereco', function (Blueprint $table) {
            $table->id("CodigoEndereco");
            $table->bigInteger("CodigoBairro")->unsigned();
            $table->foreign("CodigoBairro")->references("CodigoBairro")->on("Bairro");
            $table->bigInteger("CodigoCidade")->unsigned();
            $table->foreign("CodigoCidade")->references("CodigoCidade")->on("Cidade");
            $table->bigInteger("CodigoPessoa")->unsigned();
            $table->foreign("CodigoPessoa")->references("CodigoPessoa")->on("Pessoa");
            $table->string("Logradouro", 350);
            $table->string("Complemento", 200)->nullable();
            $table->string("Numero", 12)->nullable();
            $table->boolean("Principal")->default(false);
            $table->timestamp("DataCriacao")->default(DB::raw("CURRENT_TIMESTAMP"));
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
        Schema::dropIfExists('Endereco');
    }
};
