<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tb_Funcionario;

class DefaultController extends Controller
{
    public function index() {

        $funcs = tb_Funcionario::all();

        return view('default')->with('funcs', $funcs);
    }

    public function filter(Request $req) {

        switch ($req->filter) {
            case 1:
                $req->filter = 'RJ';
                break;

            case 2:
                $req->filter = 'SP';
                break;
            
            default:
                $req->filter = 'N/A';
                break;
        }

        $funcs = tb_Funcionario::where('vc_func_filial', $req->filter)->get();

        return $funcs;
    }

    public function save(Request $req)
    {
        switch ($req->filial) {
            case 1:
                $req->filial = 'RJ';
                break;

            case 2:
                $req->filial = 'SP';
                break;
        }

        try {
            tb_Funcionario::insert([
                'vc_func_nome' => $req->nome,
                'vc_func_funcional' => $req->funcional,
                'vc_func_filial' => $req->filial,
            ]);

            return 'success';
        } catch (\Exception $e) {
            return $e;
        }
    }
}
