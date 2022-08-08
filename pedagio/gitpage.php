<?php

require_once 'inc\header.php';

?>

<body>
    <div class="container-fluid">
        <div class="m-3">
            <div class="row ">
                <div class="col-sm-4 mb-2">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="nome" placeholder="nome" style="background-color: #d3d3d4" required>
                        <label for="floatingInputGrid" style="color: grey">Nome:</label>
                    </div>
                </div>
                <div class="col-sm-1">
                    <button type="button" class="btn mt-2 ms-1 desabilita" style=" background-color: #216624; color: white" onclick="buscarDados()">Buscar</button>
                </div>
            </div>


            <div id="aviso" ; class="alert alert-dark" ; style="display:none; text-align: center; color: black; font-weight: bolder; font-size: 20px ">SEM DADOS
            </div>

            <div id="tabela"></div>
        </div>

    </div>

    <script>
        function desabilitaBotao() {
            $("button.desabilita").attr("disabled", true);
            $("button.desabilita").html("Buscando...");
        }

        function habilitaBotao() {
            $("button.desabilita").attr("disabled", false);
            $("button.desabilita").html("Buscar");
        }

        function limpaDados() {
            $("#tabela").html("");
            $('#aviso').hide();
        }



        function buscarDados() {
            var nome = $("#nome").val();
            limpaDados();
            desabilitaBotao();
            $.ajax({
                url: 'ajax/gitpage.php?act=buscar&nome=' + nome,
                type: 'GET',
                dataType: 'json',
                beforeSend: function() {},
                complete: function() {
                    habilitaBotao();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log(thrownError);
                },
                success: function(result) {
                    //console.log(result);
                    if (result.ok == 1) {
                        var html = montaTabela(result.dados);
                        $("#tabela").html(html);
                    } else {
                        $('#aviso').show();
                        $("#aviso").html("SEM DADOS");
                    }
                },
            });


        }

        function montaTabela(dados) {

            console.log(dados);
            $("#aviso").show();
            $("#aviso").html("LISTA DE DADOS");


            var html = ''
            html += '<table class="table table-dark table-striped" ';
            html += '<thead class="m-2" style="color: forestgreen">';
            html += '<tr>';
            html += '   <th scope="col">#ID</th>';
            html += '   <th scope="col">Nome</th>';
            html += '   <th scope="col">Linguagem</th>';
            html += '   <th scope="col">Última modificação</th>';
            html += '   <th scope="col">Data de criação</th>';
            html += '</tr>';
            html += '</thead>';
            $.each(dados, function(i, item) {
                console.log(item);

                html += '<tr>';
                html += '<td>' + item.id + '</td>';
                html += '<td>' + item.name + '</td>';
                html += '<td>' + item.language + '</td>';
                html += '<td>' + getDataFormatada(new Date(item.updated_at)) + '</td>';
                html += '<td>' + getDataFormatada(new Date(item.created_at)) + '</td>';
                html += '</tr>';
            });

            html += '</table>';

            return html;
        }

        function getDataFormatada(data) {
            return adicionaZero(data.getDate()) + "/" + adicionaZero(data.getMonth() + 1) + "/" + data.getFullYear() + " " + adicionaZero(data.getHours()) + ":" + adicionaZero(data.getMinutes());
        }

        function adicionaZero(numero) {
            if (numero <= 9)
                return "0" + numero;
            else
                return numero;
        }
    </script>
</body>
<?php
require_once 'inc\footer.php';
