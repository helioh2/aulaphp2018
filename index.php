
<html>
    <head>
        <title>Listar Clientes</title>        
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
        <script src="./jquery.min.js"></script>
    </head>
    <body>
        <?php include_once './menu.php'; ?>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel panel-heading">
                    <strong>Lista de Clientes</strong>
                </div>
                <div class="panel panel-body">
                    <table id="tabela_clientes" class="table table-condensed table-striped">
                        <thead class="text-center">
                            <th>id</th>
                            <th>nome</th>
                            <th>idade</th>
                            <th>sexo</th>
                            <th>data nascimento</th>
                            <th>email</th>
                            <th>endereco</th>
                            <th><a href='formInserir.php' class="btn btn-success    ">Inserir</a></th>
                        </thead>
                        <tbody></tbody>
                                        
                    </table>

                    <h2 id="mensagem_erro"></h2>

                </div>
            </div>
        </div>

        <script>

        
                $.ajax({
                    url: "clientes.php",
                    method: "GET",
                    error: function funcao_erro(retorno) {
                        // document.getElementById("mensagem_erro").innerHTML = "Ocorreu um erro no servidor!"
                        $("#mensagem_erro").html("Ocorreu um erro no servidor!");
                    },
                    success: function funcao_sucesso(retorno) {
                        var tabela = "";
                        alert(retorno);
                        retorno = JSON.parse(retorno);

                        for (var i = 0; i < retorno.length; i++) {
                            item = retorno[i];
                            
                            tabela += "<tr>"+
                                        "<td>"+item.id+"</td>" +
                                        "<td>"+item.nome+"</td>" +
                                        "<td>"+item.idade+"</td>" +
                                        "<td>"+item.sexo+"</td>" +
                                        "<td>"+item.dataNascimento+"</td>" +
                                        "<td>"+item.email+"</td>" +
                                        "<td>"+item.endereco+"</td>" +
                                        "<td>" +
                                            "<a href='deletar.php?id="+item.id+"' class='btn btn-danger'>Deletar</a> "+
                                            "<a href='formAlterar.php?id="+item.id+"' class='btn btn-primary'>Alterar</a>"+
                                        "</td>" +
                                        "</tr>   ";
                            
                        }
                        $("#tabela_clientes tbody").html(tabela);

                    }
                }
                )
            


        </script>

    </body>
</html>









