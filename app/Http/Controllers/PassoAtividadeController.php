<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\Collection;

use App\PassoAtividade;

class PassoAtividadeController extends Controller
{
   /**
     * Retorna todos os passos de atividades
     *
     * @return PassoAtividade[]|Collection
     */
    public function index(){
        return PassoAtividade::all();
    }

    /**
     * Retorna um passo de uma atividade
     * pelo código
     *
     * @param int $codPassoAtividade
     * @return mixed
     */
    public function show(int $codPassoAtividade){
        return PassoAtividade::find($codPassoAtividade);
    }

     /**
     * Adiciona um novo passo de uma atividade
     *
     * @param Request $request
     * @return mixed
     * @throws ValidationException
     */
    public function store(Request $request){
        $passoAtividade = $this->validate($request, PassoAtividade::$rules);
        $passoAtividade['imagemPassoAtividade'] = $this->uploadImagem($request->imagem, 300, 300, 'PassoAtividade');
        PassoAtividade::create($passoAtividade);
    }

    /**
     * Atualiza o passo de uma atividade
     *
     * @param Request $request
     * @param int $codPassoAtividade
     * @return void
     * @throws ValidationException
     */
    public function update(Request $request, int $codPassoAtividade){
        $this->validate($request, PassoAtividade::$rules);

        $passoAtividade = PassoAtividade::findOrFail($codPassoAtividade);

        if ( $request->has('imagem') ) {
            $this->deletaImagem($passoAtividade['imagemPassoAtividade'], 'PassoAtividade');
            $request->imagemPassoAtividade = $this->uploadImagem($request->imagem, 300, 300, 'PassoAtividade');
        }

        $passoAtividade->update($request->all());
    }

    /**
     * Exclui o passo de uma atividade
     *
     * @param int $codPassoAtividade
     */
    public function destroy(int $codPassoAtividade){
        PassoAtividade::destroy($codPassoAtividade);
    }
}
