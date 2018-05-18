function carregaClientes(){
    $.ajax({
        url: "clientes.php",
        method: "GET",
        error: function funcao_erro(retorno) {
            // document.getElementById("mensagem_erro").innerHTML = "Ocorreu um erro no servidor!"
            $("#mensagem_erro").html("Ocorreu um erro no servidor!");
        },
        success: function funcao_sucesso(retorno) {
            var tabela = "";
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
                                "<a href='formAlterar.html?id="+item.id+"' class='btn btn-primary'>Alterar</a>"+
                            "</td>" +
                            "</tr>   ";
                
            }
            $("#tabela_clientes tbody").html(tabela);

        }
    }
    )
}