<?php

$conexao = mysqli_connect("localhost", "root", "root") or die("erro ao conectar");
$banco = mysqli_select_db($conexao, "aulaweb") or die(mysqli_error($conexao));
mysqli_set_charset($conexao, "utf8");

