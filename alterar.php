<?php
include 'conexao.php';

$id = $_GET['id'];

$sql = "SELECT * FROM cliente WHERE id = $id";

$dados = mysqli_query($conexao, $sql) or die(mysql_error($conexao));

$cliente = mysqli_fetch_assoc($dados);

?>

<html>
	<head>
		<title>Alterando</title>
	</head>
	<body>
		<form action="gravar.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $cliente['id'];?>"/>
			Nome:<input type="text" name="nome" value="<?php echo $cliente['nome'];?>"/>
			<br>
			<br>
			Idade:<input type="number" name="idade" value="<?php echo $cliente['idade'];?>"/>
			<br>
			<br>
			Sexo:<input type="text" name="sexo" value="<?php echo $cliente['sexo'];?>"/>
			<br>
			<br>
			dataNascimento:<input type="date" name="dataNascimento" value="<?php echo $cliente['dataNascimento'];?>"/>
			<br>
			<br>
			email:<input type="mail" name="email" value="<?php echo $cliente['email'];?>"/>
			<br>
			<br>
			endereco:<input type="text" name="endereco" value="<?php echo $cliente['endereco'];?>"/>
			<br>
			<br>
			
			<input type="submit" />
		</form> 	
	</body>
</html>
