<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $fillable = [
        "CodigoEndereco",
        "CodigoBairro",
        "CodigoCidade",
        "CodigoPessoa",
        "Logradouro",
        "Complemento",
        "Numero",
        "Principal",
        "DataCriacao"
    ];

    protected $table = "Endereco";
}
