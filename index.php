<?php

include './verificaLogin.php';
include "conexao.php";
$sql = "select * from cliente";
$dados = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
?>
<html>
    <head>
        <title>Listar Clientes</title>        
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <?php include_once './menu.php'; ?>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel panel-heading">
                    <strong>Lista de Clientes</strong>
                </div>
                <div class="panel panel-body">
                    <table class="table table-condensed table-striped">
                        <tr class="text-center">
                            <th>id</th>
                            <th>nome</th>
                            <th>idade</th>
                            <th>sexo</th>
                            <th>data nascimento</th>
                            <th>email</th>
                            <th>endereco</th>
                            <th><a href='formInserir.php' class="btn btn-success    ">Inserir</a></th>
                        </tr>
                        <?php
                        while ($cliente = mysqli_fetch_assoc($dados)) {
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
                                                        <td>
                                                            <a href='deletar.php?id=$id' class='btn btn-danger'>Deletar</a> 
                                                            <a href='formAlterar.php?id=$id' class='btn btn-primary'>Alterar</a>
                                                        </td>
                                                </tr>";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>









