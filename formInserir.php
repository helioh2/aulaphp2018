<?php 

include './verificaLogin.php';
?>

<html>
    <head>
        <title>Inserindo</title>        
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <?php include_once './menu.php'; ?>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel panel-heading">
                    <strong>Novo Cliente</strong>
                </div>
                <div class="panel panel-body">
                    <form action="inserir.php" method="POST">

                        <div class="form-group">
                            <label  for="nome">Nome:</label>
                            <input class="form-control" type="text" name="nome" required="true"/>
                        </div>
                        <div class="form-group">
                            <label for="idade">Idade:</label>
                            <input class="form-control" type="number" name="idade"  required="true"/>
                        </div>
                        <div class="form-group">
                            <label for="sexo">Sexo:</label>
                            <input class="form-control" type="text" maxlength="1" name="sexo"  required="true"/>
                        </div>
                        <div class="form-group">
                            <label for="dataNascimento">Data de Nascimento:</label>
                            <input class="form-control" type="date" name="dataNascimento"  required="true"/>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input class="form-control" type="email" name="email"  required="true"/>
                        </div>
                        <div class="form-group">
                            <label for="endereco">Endereço:</label>
                            <input class="form-control" type="text" name="endereco"  required="true"/>
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

