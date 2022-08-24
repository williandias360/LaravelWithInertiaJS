<?php

namespace App\Http\Controllers;

use App\Imports\CidadeImport;
use App\Models\Cidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;

class CidadeController extends Controller
{
    public function listar(int $codigoEstado)
    {
        $cidades = Cidade::where("CodigoEstado", $codigoEstado)->get();
        return Response::json($cidades);
    }

    public function importar()
    {
        Excel::import(new CidadeImport, "C:\ESD\RELATORIO_DTB_BRASIL_MUNICIPIO.xls");
    }
}
