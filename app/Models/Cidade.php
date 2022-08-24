<?php

namespace App\Models;

use App\Models\Estado;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cidade extends Model
{
    use HasFactory;

    protected $fillable = ["CodigoCidade", "CodigoEstado", "Nome", "CodigoIbge"];
    protected $table = "Cidade";

    public function estado()
    {
        return $this->hasOne(Estado::class);
    }
}
