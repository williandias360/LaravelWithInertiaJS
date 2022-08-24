<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        return Inertia::render("ClienteGerenciar", [
            "cliente" => [
                "CodigoCliente" => 1,
                "Nome" => "Willian Dias Brito"
            ]
        ]);
    }
    public function Incluir(Request $request)
    {
        //Excel::load();
        //https://docs.laravel-excel.com/3.1/getting-started/installation.html
    }
}
