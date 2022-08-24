<?php

namespace App\Models;

use App\Models\Cidade;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Estado extends Model
{
    use HasFactory;

    protected $fillable = ["CodigoEstado", "Nome", "Uf"];
    protected $table = "Estado";

    public function cidades()
    {
        return $this->hasMany(Cidade::class);
    }
}
