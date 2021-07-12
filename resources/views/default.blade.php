@extends('script')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Default</title>
</head>
<body>
    <div class="row mt-2">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-title">
                    <h3 class="text-center mt-2">Colaboradores/Filiais</h3>
                </div>
                <div class="card-body">
                    <table id="tableFuncionario" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Funcional</th>
                                <th>Filial</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($funcs as $f)
                                <tr>
                                    <td>{{ $f->vc_func_nome }}</td>
                                    <td>{{ $f->vc_func_funcional }}</td>
                                    <td>{{ $f->vc_func_filial }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="input-group">
                        <select id="selectFilial" class="custom-select">
                            <option value="0" selected>Filtre por filial...</option>
                            <option value="1">RJ</option>
                            <option value="2">SP</option>
                        </select>
                    </div>
                </div>
            </div>
            <button class="btn btn-success font-weight-bold float-right mt-1" data-toggle="modal" data-target="#modalFunc">Adicionar Funcionário</button>
            <a href="/"><button id="btnRemove" class="btn btn-danger font-weight-bold float-right mt-1 mr-2">Remover Filtros</button></a>
        </div>
    </div>
</body>

{{-- Modal para inserção de novos funcionários --}}
<div class="modal fade" id="modalFunc" tabindex="-1" aria-hidden="true">  
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar um Funcionário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-funcionario">
                    <div class="row mt-1">
                        <div class="col-md-12">
                            <label for="nome-funcionario" class="font-weight-bold">Nome do Funcionário</label>
                            <input class="form-control" type="text" name="nome-funcionario" id="nome-funcionario">
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-12">
                            <label for="funcional-funcionario" class="font-weight-bold">Funcional</label>
                            <input class="form-control" type="text" name="funcional-funcionario" id="funcional-funcionario">
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-12">
                            <label for="filial-funcionario" class="font-weight-bold">Filial</label>
                            <select class="form-control" name="filial-funcionario" id="filial-funcionario">
                                <option value="0">Selecione a filial...</option>
                                <option value="1">RJ</option>
                                <option value="2">SP</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="btn-close" type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button id="btn-salvar-funcionario" type="button" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>
</div>

</html>

<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>

<script>

    $(document).ready(function(){ 
        
        $('#selectFilial').on('change', function(){
            $.ajax({
                type: "POST",
                url: "/",
                data: {
                    '_token': "{{ csrf_token() }}",
                    'filter': $('#selectFilial').val()
                },
                success: function (response) {
                    $("#tableFuncionario tbody tr").remove();
                    for (var i = 0; i < count(response); i ++) {
                        $("#tableFuncionario>tbody").append(
                            "<tr><td>" + response[i].vc_func_nome + 
                                "</td><td>" + response[i].vc_func_funcional + 
                                    "</td><td>" + response[i].vc_func_filial + "</td></tr>");
                    }
                },
                error: function (response) {
                    console.log(response);
                }
            });
        });

        $('#btn-salvar-funcionario').on('click', function () {

            $.ajax({
                type: "POST",
                url: "/save",
                data: {
                    '_token': "{{ csrf_token() }}",
                    'nome': $('#nome-funcionario').val(),
                    'funcional': $('#funcional-funcionario').val(),
                    'filial': $('#filial-funcionario').val(),
                },
                success: function (response) {
                    if (response == 'success') {
                        window.location.reload();
                    } else {
                        console.log(response);
                    }
                },
                error: function (response) {
                    console.log(response);
                }
            });
        
        });

        function count(obj) {
            var qtd = 0;
            var key;

            for(key in obj) {
                if(obj.hasOwnProperty(key)) {
                    qtd++;
                }
            }
            return qtd;
        }

    });

</script>

