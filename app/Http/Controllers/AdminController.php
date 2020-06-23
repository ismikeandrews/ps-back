<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

use App\Admin;

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
        $res = Admin::create($admin);
        return response()->json(['status' => 'success']);
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

    public function authenticate(Request $request){
        $this->validate($request, [
            'userAdmin'  => 'required',
            'senhaAdmin' => 'required'
        ]);

        $admin = Admin::where('userAdmin', $request->input('userAdmin'))->first();
        if($admin === null){
            return response()->json(['status' => 'fail'], 401); 
        }
        if ($request->senhaAdmin === $admin->senhaAdmin) {
            $apikey = base64_encode(Str::random(40));

            return response()->json([
                'status'    => 'success',
                'token'   => $apikey, 
                'adminId'   => $admin->codAdmin, 
                'userAdmin' => $admin->userAdmin
            ]);
        }else{
            return response()->json(['status' => 'fail'], 401);
        }
    }
}
