<?php

include './verificaLogin.php';
include 'conexao.php';

$id = $_GET['id'];

$sql = "SELECT * FROM cliente WHERE id = $id";

$result = $conexao->query($sql);
$conexao->close();
if (!$result) {
    echo "{'erro': 'Erro na execução da query. Veja log no servidor.'}";
}
if ($result->num_rows < 1){
    echo "{'erro': 'Usuario não encontrado'}";
} else {
    $cliente = mysqli_fetch_assoc($result);
    echo json_encode($cliente);
}


?>