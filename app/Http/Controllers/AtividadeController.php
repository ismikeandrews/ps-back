<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AtividadeController extends Controller
{
     /**
     * Retorna todas as Atividade
     *
     * @return Atividade[]|Collection
     */
    public function index(){
        return Atividade::all();
    }

    /**
     * Retorna uma atividade específica
     * pelo código
     *
     * @param int $codAtividade
     * @return mixed
     */
    public function show(int $codAtividade){
        return Atividade::find($codAtividade);
    }

     /**
     * Adiciona uma nova atividade
     *
     * @param Request $request
     * @return mixed
     * @throws ValidationException
     */
    public function store(Request $request){
        $atividade = $this->validate($request, Atividade::$rules);
        $atividade['imagemAtividade'] = $this->uploadImagem($request->imagem, 300, 300, 'atividade');
        Atividade::create($atividade);
    }

    /**
     * Atualiza uma atividade
     *
     * @param Request $request
     * @param int $codAtividade
     * @return void
     * @throws ValidationException
     */
    public function update(Request $request, int $codAtividade){
        $this->validate($request, Atividade::$rules);

        $atividade = Atividade::findOrFail($codAtividade);

        if ( $request->has('imagem') ) {
            $this->deletaImagem($atividade['imagemAtividade'], 'atividade');
            $request->imagemAtividade = $this->uploadImagem($request->imagem, 300, 300, 'atividade');
        }

        $atividade->update($request->all());
    }
}
