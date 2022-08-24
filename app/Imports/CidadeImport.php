<?php

namespace App\Imports;

use App\Models\Cidade;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class CidadeImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        $lista = [];
        foreach ($rows as $index => $row) {
            if ($index == 0)
                continue;

            $lista[] = [
                "Nome" => $row[12],
                "CodigoIbge" => $row[11],
                "CodigoEstado" => $row[0]
            ];
        }

        Cidade::insert($lista);
    }
}
