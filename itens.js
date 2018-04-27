
function carregarItens() {
    var itens = "", url="backend/listar.php";

    $.ajax({
        url: url,
        cache: false,
        dataType: "json",
        beforeSend: function() {
            $("h2").html("Carregando...");
        },
        error: function() {
            $("h2").html("Há algum problema na fonte dos dados.");
            window.location.replace("login.html");
        },
        success: function(retorno) {
            if (retorno[0].erro) {
                $("h2").html(retorno[0].erro);
            } else {
                retorno.forEach(element => {
                    itens += `<tr>"+
                                <td> ${element.id} </td>
                                <td> ${element.nome} </td>
                                <td> ${element.idade} </td>
                                <td> ${element.sexo} </td>
                                <td> ${element.dataNascimento} </td>
                                <td> ${element.email} </td>
                                <td> ${element.endereco} </td>`;
                    itens += `<td>
                                <a href='backend/deletar.php?id=${element.id}' class='btn btn-danger'>Deletar</a> 
                                <a href='formAlterar.html?id=${element.id}' class='btn btn-primary'>Alterar</a> 
                                </td>`;

                    $("#tabClientes tbody").html(itens);

                    $("h2").html("");
                
                });
            }

        }
    });

}