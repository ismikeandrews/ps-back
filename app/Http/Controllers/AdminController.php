<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Retorna todos os admins
     *
     * @return Admin[]|Collection
     */
    public function index(){
        return Admin::all();
    }

    /**
     * Retorna um admin específico
     * pelo código
     *
     * @param int $codAdmin
     * @return mixed
     */
    public function show(int $codAdmin){
        return Admin::find($codAdmin);
    }

     /**
     * Adiciona um novo admin
     *
     * @param Request $request
     * @return mixed
     * @throws ValidationException
     */
    public function store(Request $request){
        $admin = $this->validate($request, Admin::$rules);
        Admin::create($admin);
    }

    /**
     * Atualiza um admin
     *
     * @param Request $request
     * @param int $codAdmin
     * @return void
     * @throws ValidationException
     */
    public function update(Request $request, int $codAdmin){
        $this->validate($request, Admin::$rules);

        $admin = Admin::findOrFail($codAdmin);

        $admin->update($request->all());
    }
}
