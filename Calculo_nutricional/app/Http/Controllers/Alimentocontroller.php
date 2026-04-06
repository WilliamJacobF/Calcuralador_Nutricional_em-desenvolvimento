<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Alimento;
use Illuminate\Http\Request;

class Alimentocontroller extends Controller
{
    public function index()
    {
        return Alimento::all();
    }

    public function buscarPorNome($nome)
    {
        $rua = Alimento::where('Nome', 'like', "%$nome%")->first();
        if (!$rua) {
            return response()->json(['mensagem' => 'alimento não encontrada'], 404);
        }

        return response()->json($rua);
    }
}
