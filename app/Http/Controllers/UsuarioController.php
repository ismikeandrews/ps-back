<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UsuarioController extends Controller
{
    /**
     * Retorna todos os usuários
     *
     * @return Usuario[]|Collection
     */
    public function index(){
        return Usuario::all();
    }

    /**
     * Retorna um usuário específico
     * pelo código
     *
     * @param int $codUsuario
     * @return mixed
     */
    public function show(int $codUsuario){
        return Usuario::find($codUsuario);
    }

    /**
     * Adiciona um novo usuário
     *
     * @param Request $request
     * @return mixed
     * @throws ValidationException
     */
    public function store(Request $request){
        $usuario = $this->validate($request, Usuario::$rules);
        $usuario['imagemUsuario'] = $this->uploadImagem($request->imagem, 300, 300, 'usuario');
        Usuario::create($usuario);
    }

    /**
     * Atualiza um usuário
     *
     * @param Request $request
     * @param int $codUsuario
     * @return void
     * @throws ValidationException
     */
    public function update(Request $request, int $codUsuario){
        $this->validate($request, Usuario::$rules);

        $usuario = Usuario::findOrFail($codUsuario);

        if ( $request->has('imagem') ) {
            $this->deletaImagem($usuario['imagemUsuario'], 'usuario');
            $request->imagemUsuario = $this->uploadImagem($request->imagem, 300, 300, 'usuario');
        }

        $usuario->update($request->all());
    }

    /**
     * Exclui um usuário
     *
     * @param int $codUsuario
     * @return void
     */
    public function destroy(int $codUsuario){
        Usuario::destroy($codUsuario);
    }
}
