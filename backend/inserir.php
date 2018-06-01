<?php

include 'verificaLogin.php';
include 'conexao.php';

$cliente = json_decode(file_get_contents("php://input"));

$sql = "INSERT INTO cliente(id, nome, idade, sexo, 
		dataNascimento, email, endereco) VALUES 
		(null,'$cliente->nome',$cliente->idade,'$cliente->sexo',
		'$cliente->dataNascimento',
		'$cliente->email','$cliente->endereco');";

$inserir =  mysqli_query($conexao, $sql);

if ($inserir) {
	error_log(mysqli_error($conexao));
    echo "{}";
} else {
	error_log(mysqli_error($conexao));
	echo "{'erro': 'Ocorreu um erro ao alterar'}";	
}