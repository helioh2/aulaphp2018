<?php

// include 'verificaLogin.php';
include "conexao.php";


$sql = "select * from cliente";
$result = $conexao->query($sql);
$conexao->close();
if (!$result) {
    echo "{'erro': 'Erro na execução da query. Veja log no servidor.'}";
} else if ($result->num_rows < 1) {
    echo "{'erro': 'Nenhum dado cadastrado'}";
} else {
    while ($cliente = mysqli_fetch_assoc($result)) {
        $clientes[] = $cliente;
    }
    echo json_encode($clientes, JSON_PRETTY_PRINT);
}


