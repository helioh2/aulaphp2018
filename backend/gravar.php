<?php
include('conexao.php');

$cliente = json_decode(file_get_contents("php://input"));

$sql = "UPDATE cliente SET 
	nome= '$cliente->nome' ,idade=$cliente->idade,sexo='$cliente->sexo',dataNascimento='$cliente->dataNascimento',
	email='$cliente->email',endereco='$cliente->endereco' 
	WHERE id=$cliente->id;";

error_log($sql);

$gravar = mysqli_query($conexao, $sql);

if ($gravar) {
	error_log(mysqli_error($conexao));
    echo "{}";
} else {
	error_log(mysqli_error($conexao));
    echo "{'erro': 'Ocorreu um erro ao alterar'}";		
}


?>
