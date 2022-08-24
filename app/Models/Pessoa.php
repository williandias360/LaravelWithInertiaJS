<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $fillable = [
        "CodigoPessoa",
        "Nome",
        "PerfilCliente",
        "PerfilEmpresa",
        "PerfilUsuario",
        "PerfilFornecedor",
        "Observacao",
        "DataCriacao",
    ];

    protected $table = "Pessoa";
}