<?php

namespace Database\Seeders;

use App\Models\Estado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estados = [
            [
                "CodigoEstado" => "11",
                "Nome" => "Rondônia",
                "Uf" => "RO"
            ],
            [
                "CodigoEstado" => "12",
                "Nome" => "Acre",
                "Uf" => "AC"
            ],
            [
                "CodigoEstado" => "13",
                "Nome" => "Amazonas",
                "Uf" => "AM"
            ],
            [
                "CodigoEstado" => "14",
                "Nome" => "Roraima",
                "Uf" => "RR"
            ],
            [
                "CodigoEstado" => "15",
                "Nome" => "Pará",
                "Uf" => "PA"
            ],
            [
                "CodigoEstado" => "16",
                "Nome" => "Amapá",
                "Uf" => "AP"
            ],
            [
                "CodigoEstado" => "17",
                "Nome" => "Tocantins",
                "Uf" => "TO"
            ],
            [
                "CodigoEstado" => "21",
                "Nome" => "Maranhão",
                "Uf" => "MA"
            ],
            [
                "CodigoEstado" => "22",
                "Nome" => "Piauí",
                "Uf" => "PI"
            ],
            [
                "CodigoEstado" => "23",
                "Nome" => "Ceará",
                "Uf" => "CE"
            ],
            [
                "CodigoEstado" => "24",
                "Nome" => "Rio Grande do Norte",
                "Uf" => "RN"
            ],
            [
                "CodigoEstado" => "25",
                "Nome" => "Paraíba",
                "Uf" => "PB"
            ],
            [
                "CodigoEstado" => "26",
                "Nome" => "Pernambuco",
                "Uf" => "PE"
            ],
            [
                "CodigoEstado" => "27",
                "Nome" => "Alagoas",
                "Uf" => "AL"
            ],
            [
                "CodigoEstado" => "28",
                "Nome" => "Sergipe",
                "Uf" => "SE"
            ],
            [
                "CodigoEstado" => "29",
                "Nome" => "Bahia",
                "Uf" => "BA"
            ],
            [
                "CodigoEstado" => "31",
                "Nome" => "Minas Gerais",
                "Uf" => "MG"
            ],
            [
                "CodigoEstado" => "32",
                "Nome" => "Espírito Santo",
                "Uf" => "ES"
            ],
            [
                "CodigoEstado" => "33",
                "Nome" => "Rio de Janeiro",
                "Uf" => "RJ"
            ],
            [
                "CodigoEstado" => "35",
                "Nome" => "São Paulo",
                "Uf" => "SP"
            ],
            [
                "CodigoEstado" => "41",
                "Nome" => "Paraná",
                "Uf" => "PR"
            ],
            [
                "CodigoEstado" => "42",
                "Nome" => "Santa Catarina",
                "Uf" => "SC"
            ],
            [
                "CodigoEstado" => "43",
                "Nome" => "Rio Grande do Sul",
                "Uf" => "RS"
            ],
            [
                "CodigoEstado" => "50",
                "Nome" => "Mato Grosso do Sul",
                "Uf" => "MS"
            ],
            [
                "CodigoEstado" => "51",
                "Nome" => "Mato Grosso",
                "Uf" => "MT"
            ],
            [
                "CodigoEstado" => "52",
                "Nome" => "Goiás",
                "Uf" => "GO"
            ],
            [
                "CodigoEstado" => "53",
                "Nome" => "Distrito Federal",
                "Uf" => "RO"
            ],
        ];

        Estado::insert($estados);
    }
}
