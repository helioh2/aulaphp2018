<?php

include './verificaLogin.php';
include 'conexao.php';

$id = $_GET['id'];

$sql = "SELECT * FROM cliente WHERE id = $id";

$dados = mysqli_query($conexao, $sql) or die(mysql_error($conexao));

$cliente = mysqli_fetch_assoc($dados);
?>

<html>
    <head>
        <title>Alterando</title>        
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <?php include_once './menu.php'; ?>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel panel-heading">
                    <strong>Alterando Cliente <?php echo $cliente['nome']; ?></strong>
                </div>
                <div class="panel panel-body">
                    <form action="gravar.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $cliente['id']; ?>"/>
                        
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input class="form-control" type="text" name="nome" value="<?php echo $cliente['nome']; ?>" required="true"/>
                        </div>
                        <div class="form-group">
                            <label for="idade">Idade:</label>
                            <input class="form-control" type="number" name="idade" value="<?php echo $cliente['idade']; ?>" required="true"/>
                        </div>
                        <div class="form-group">
                            <label for="sexo">Sexo:</label>
                            <input class="form-control" type="text" maxlength="1" name="sexo" value="<?php echo $cliente['sexo']; ?>" required="true"/>
                        </div>
                        <div class="form-group">
                            <label for="dataNascimento">Data de Nascimento:</label>
                            <input class="form-control" type="date" name="dataNascimento" value="<?php echo $cliente['dataNascimento']; ?>" required="true"/>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input class="form-control" type="email" name="email" value="<?php echo $cliente['email']; ?>" required="true"/>
                        </div>
                        <div class="form-group">
                            <label for="endereco">Endereço:</label>
                            <input class="form-control" type="text" name="endereco" value="<?php echo $cliente['endereco']; ?>" required="true"/>
                        </div>
                        
                        <div class="text-right">
                            <a href='index.php' class="btn btn-danger">Cancelar</a>
                            <input type="submit" value="Gravar" class="btn btn-success"/>
                        </div>
                    </form> 	
                </div>
            </div>
        </div>
    </body>
</html>