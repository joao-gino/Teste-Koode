<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_Funcionario extends Model
{
    use HasFactory;

    protected $table = 'tb_Funcionarios';

    protected $fillable = [
        'vc_func_nome',
        'vc_func_funcional',
        'vc_func_filial',
    ];
}
