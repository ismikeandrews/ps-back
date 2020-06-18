<?php

namespace App\Http\Controllers;

use App\Publicacao;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PublicacaoController extends Controller
{
    /**
     * Retorna todas publicações de
     * uma atividade
     *
     * @param int $codAtividade
     * @return mixed
     */
    public function index(int $codAtividade){
        return Publicacao::where('codAtividade', $codAtividade)->get();
    }

    /**
     * Insere uma nova publicação
     *
     * @param Request $request
     * @return void
     * @throws ValidationException
     */
    public function store(Request $request){
        $publicacao = $this->validate($request, Endereco::$rules);
        $publicacao['imagemPublicacao'] = $this->uploadImagem($request->imagem, 300, 300, 'publicacao');

        Publicacao::create($publicacao);
    }

    /**
     * Atualiza uma publicação
     *
     * @param Request $request
     * @param int $codPublicacao
     * @return void
     * @throws ValidationException
     */
    public function update(Request $request, int $codPublicacao){
        $this->validate($request, Publicacao::$rules);

        $publicacao = Publicacao::findOrFail($codPublicacao);

        if ( $request->has('imagem') ) {
            $this->deletaImagem($publicacao['imagemPublicacao'], 'publicacao');
            $request->imagemPublicacao = $this->uploadImagem($request->imagem);
        }

        $publicacao->update($request->all());
    }

    /**
     * Exclui uma publicação
     *
     * @param int $codPublicacao
     * @return void
     */
    public function destroy(int $codPublicacao){
        Publicacao::destroy($codPublicacao);
    }
}
