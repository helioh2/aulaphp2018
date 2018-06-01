<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "cliente";

$conexao = new mysqli($servername, $username, $password, $dbname);

if ($conexao->connect_error) {
    echo "{'erro': 'Impossível conectar ao banco'}";
}

mysqli_set_charset($conexao, "utf8");

?>