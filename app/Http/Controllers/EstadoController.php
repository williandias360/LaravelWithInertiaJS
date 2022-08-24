<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Estado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class EstadoController extends Controller
{
    public function listar()
    {
        $estados = DB::table("Estado")
            ->orderBy("Nome", "ASC")
            ->get();
        return Response::json($estados);
    }
}
