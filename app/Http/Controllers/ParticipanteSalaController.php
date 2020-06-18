<?php

namespace App\Http\Controllers;

use App\ParticipanteSala;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ParticipanteSalaController extends Controller
{
    /**
     * Insere um participante em uma sala
     *
     * @param Request $request
     * @throws ValidationException
     */
    public function store(Request $request){
        $entrar = $this->validate($request, ParticipanteSala::$rules);
        ParticipanteSala::create($entrar);
    }

    /**
     * Remove um participante de uma sala
     *
     * @param int $codUsuario
     * @param int $codSala
     */
    public function destroy(int $codUsuario, int $codSala){
        $participacao = ParticipanteSala::where([
            ['codParticipante', $codUsuario],
            ['codSala', $codSala]
        ])->first();

        ParticipanteSala::destroy($participacao->codParticipanteSala);
    }
}
