<?php
include('conexao.php');

$nome = $_POST['nome'];
$idade = $_POST['idade'];
$sexo = $_POST['sexo'];
$dataNascimento = $_POST['dataNascimento'];
$email = $_POST['email'];
$endereco = $_POST['endereco'];


$sql = "INSERT INTO cliente(id, nome, idade, sexo, 
		dataNascimento, email, endereco) VALUES 
		(null,'$nome',$idade,'$sexo','$dataNascimento',
		'$email','$endereco');";
		
$grava = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

echo $grava;		



?>
