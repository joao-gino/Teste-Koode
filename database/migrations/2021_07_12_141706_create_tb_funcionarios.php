<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbFuncionarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_Funcionarios', function (Blueprint $table) {
            $table->id('i_func_id');
            $table->string('vc_func_nome', 200);
            $table->string('vc_func_funcional', 50);
            $table->string('vc_func_filial', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_Funcionarios');
    }
}
