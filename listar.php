<?php
include "conexao.php";
$sql = "select * from cliente";
$dados = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
echo "<table>
		<tr>
			<th>id</th>
			<th>nome</th>
			<th>idade</th>
			<th>sexo</th>
			<th>data nascimento</th>
			<th>email</th>
			<th>endereco</th>
			<th></th>
			<th></th>
		</tr>";
while($cliente = mysqli_fetch_assoc($dados)){
		$id = $cliente['id'];
		$nome = $cliente['nome'];
		$idade = $cliente['idade'];
		$sexo = $cliente['sexo'];
		$dataNascimento = $cliente['dataNascimento'];
		$email = $cliente['email'];
		$endereco = $cliente['endereco'];
		echo "<tr>
					<td>$id</td>
					<td>$nome</td>
					<td>$idade</td>
					<td>$sexo</td>
					<td>$dataNascimento</td>
					<td>$email</td>
					<td>$endereco</td>
					<td><a href='deletar.php?id=$id'>Deletar</a></td>
					<td><a href='alterar.php?id=$id'>Alterar</a></td>
				</tr>";		
}
echo "</table>";
?>







