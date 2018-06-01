<?php

include 'conexao.php';

$login = $_POST['login'];
$senha = $_POST['senha'];

$sql = "select * from login "
        . "where login = '$login' and "
        . "senha = '$senha';";

$query = mysqli_query($conexao, $sql);

$result = mysqli_num_rows($query);

session_start();
if ($result > 0) {
    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $senha;
    header("location:../index.html");
} else {
    include './logoff.php';
}



