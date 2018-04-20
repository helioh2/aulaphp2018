<?php
include('conexao.php');

$id = $_POST['id'];
$nome = $_POST['nome'];
$idade = $_POST['idade'];
$sexo = $_POST['sexo'];
$dataNascimento = $_POST['dataNascimento'];
$email = $_POST['email'];
$endereco = $_POST['endereco'];


$sql = "UPDATE cliente SET 
	nome= '$nome' ,idade=$idade,sexo='$sexo',dataNascimento='$dataNascimento',
	email='$email',endereco='$endereco' 
	WHERE id=$id;";
		
$alterar = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

echo $alterar;		



?>
