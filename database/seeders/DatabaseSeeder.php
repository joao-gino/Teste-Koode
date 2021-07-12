<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\tb_Funcionario;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        tb_Funcionario::insert([ 
            [
                'vc_func_nome' => 'Paulo da Silva',
                'vc_func_funcional' => '00015',
                'vc_func_filial' => 'RJ',
            ],
            [
                'vc_func_nome' => 'Alexandre Gomes',
                'vc_func_funcional' => '00017',
                'vc_func_filial' => 'RJ',
            ],
            [
                'vc_func_nome' => 'Joel Ortega',
                'vc_func_funcional' => '00033',
                'vc_func_filial' => 'SP',
            ],
            [
                'vc_func_nome' => 'Bruno Cardoso',
                'vc_func_funcional' => '00035',
                'vc_func_filial' => 'SP',
            ],
        ]);
    }
}
