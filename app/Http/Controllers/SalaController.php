<?php

namespace App\Http\Controllers;

use App\Sala;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SalaController extends Controller
{
    /**
     * Retorna todas salas de
     * uma atividade
     *
     * @param int $codAtividade
     * @return mixed
     */
    public function index(int $codAtividade){
        return Sala::where('codAtividade', $codAtividade)->get();
    }

    /**
     * Insere uma nova sala
     *
     * @param Request $request
     * @return void
     * @throws ValidationException
     */
    public function store(Request $request){
        $sala = $this->validate($request, Sala::$rules);
        Sala::create($sala);
    }

    /**
     * Atualiza uma sala
     *
     * @param Request $request
     * @param int $codSala
     * @return void
     * @throws ValidationException
     */
    public function update(Request $request, int $codSala){
        $this->validate($request, Sala::$rules);
        $sala = Sala::findOrFail($codSala);
        $sala->update($request->all());
    }

    /**
     * Exclui uma sala
     *
     * @param int $codSala
     * @return void
     */
    public function destroy(int $codSala){
        Sala::destroy($codSala);
    }
}
