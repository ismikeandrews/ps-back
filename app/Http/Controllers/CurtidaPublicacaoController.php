<?php

namespace App\Http\Controllers;

use App\CurtidaPublicacao;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CurtidaPublicacaoController extends Controller
{
    /**
     * Cria uma curtida em uma publicação
     *
     * @param Request $request
     * @throws ValidationException
     */
    public function store(Request $request){
        $curtida = $this->validate($request, CurtidaPublicacao::$rules);
        CurtidaPublicacao::create($curtida);
    }

    /**
     * Remove uma curtida em uma publicação
     *
     * @param int $codUsuario
     * @param int $codPublicacao
     */
    public function destroy(int $codUsuario, int $codPublicacao){
        $curtida = CurtidaPublicacao::where([
            ['codUsuario', $codUsuario],
            ['codPublicacao', $codPublicacao]
        ])->first();

        CurtidaPublicacao::destroy($curtida->codCurtidaPublicacao);
    }
}
