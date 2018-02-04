<?php
require_once('navBar.php');
require_once('ConectaBD.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <script src="bootstrap/js/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body>

        <div class="container">
            <h2>AcessaIFSP</h2>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nome</th>
                        <th>Prontuario</th>
                        <th>Telefone Fixo:</th>
						<th>Cartão:</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $pront = $_POST['var'];
                        
                        if ($pront != '') {
                            switch ($pront) {
                                case is_numeric($pront):
                                    foreach ($dbh->query("SELECT * FROM aluno where prontuario = $pront") as $linha) {

                                        echo "<td>";
                                        $avatar = "{$linha['foto']}";
                                        //echo "{$linha['foto']}";
                                        echo "<img width=\"60px\" height=\"60px\" src=\"$avatar\" />";
                                        echo "</td>";

                                        echo "<td>";
                                        echo "{$linha['nome']}";
                                        echo "</td>";

                                        echo "<td>";
                                        echo "{$linha['prontuario']}";
                                        echo "</td>";

                                        echo "<td>";
                                        echo "{$linha['celular']}";
                                        echo "</td>";
										
										echo "<td>";
                                        echo "{$linha['cartao']}";
                                        echo "</td>";
                                    }
                                    break;
                                case is_string($pront):
                                    foreach ($dbh->query("SELECT * FROM aluno where nome like '%$pront%'") as $linha) {

                                        echo "<td>";
                                        $avatar = "{$linha['foto']}";
                                        //echo "{$linha['foto']}";
                                        echo "<img width=\"60px\" height=\"60px\" src=\"$avatar\" />";
                                        echo "</td>";

                                        echo "<td>";
                                        echo "{$linha['nome']}";
                                        echo "</td>";

                                        echo "<td>";
                                        echo "{$linha['prontuario']}";
                                        echo "</td>";

                                        echo "<td>";
                                        echo "{$linha['celular']}";
                                        echo "</td>";
										
										echo "<td>";
                                        echo "{$linha['cartao']}";
                                        echo "</td>";
                                    }

                                    break;
                            }
                        } else {
                            echo "<p><c><font face=\"Verdana\" color=\"#FF0000\">Insira os dados corretamente!</font></c></p>";
                        }
                        ?>                     
                    </tr>
                </tbody>
            </table>
            <form class="form-horizontal" role="form" name="Cadastro" action="busca.php" method="get" >
                <div class="form-group">        
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Realizar nova busca</button>
                    </div>
                </div>
            </form>
            <?php if ($pront != ''): ?>
                <form class="form-horizontal" role="form" name="Cadastro" action="editarCadastro.php" method="post" >
                    <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="hidden" name="pront" value="<?php echo $pront; ?>">
                            <button type="submit" class="btn btn-default">Editar Cadastro</button>			
                        </div>
                    </div>
                </form>
                <form class="form-horizontal" role="form"  name="Cadastro" action="excluirCadastro.php" method="post">
                    <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="hidden" name="pront" value="<?php echo $pront; ?>">
                            <button type="submit" class="btn btn-default">Excluir Aluno</button>			
                        </div>
                    </div>
                </form>
            <?php endif; ?>
        </div>

    </body>
</html>
