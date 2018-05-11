<?php

include './verificaLogin.php';
include "conexao.php";
$sql = "select * from cliente";
$result = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
$dados = [];
while ($cliente = mysqli_fetch_assoc($result)) {
    $dados[] = $cliente;
}
$json = json_encode($dados);
echo $json

?>