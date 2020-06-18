<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Retorna todas as categorias
     *
     * @return Categoria[]|Collection
     */
    public function index(){
        return Categoria::all();
    }

     /**
     * Retorna um categoria especifica
     * pelo código
     *
     * @param int $codAdmin
     * @return mixed
     */
    public function show(int $codCategoria){
        return Categoria::find($codCategoria);
    }

    /**
     * Adiciona uma nova categoria
     *
     * @param Request $request
     * @return mixed
     * @throws ValidationException
     */
    public function store(Request $request){
        $categoria = $this->validate($request, Categoria::$rules);
        Categoria::create($categoria);
    }

    /**
     * Atualiza uma categoria
     *
     * @param Request $request
     * @param int $codCategoria
     * @return void
     * @throws ValidationException
     */
    public function update(Request $request, int $codCategoria){
        $this->validate($request, Categoria::$rules);

        $categoria = Categoria::findOrFail($codCategoria);

        $categoria->update($request->all());
    }
}
