<?php

include './verificaLogin.php';
include 'conexao.php';

$id = $_GET['id'];

$sql = "SELECT * FROM cliente WHERE id = $id";

$result = mysqli_query($conexao, $sql) or die(mysql_error($conexao));

$cliente = mysqli_fetch_assoc($result);

$clienteJson = json_encode($cliente);

echo $clienteJson;

?>