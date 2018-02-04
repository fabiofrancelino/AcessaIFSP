<?php
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
                        <th>Curso:</th>
						<th>Cartão:</th>
                        <th>Horário de Acesso:</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $banco = $dbh->query("select a.prontuario from aluno as a WHERE a.cartao = (SELECT dado from registro
                                       ORDER BY id DESC LIMIT 1)");

                        if (is_bool($banco->fetchColumn())) {
                            echo "<p><c><font face=\"Verdana\" color=\"#FF0000\">Não cadastrado!</font></c></p>";
                        } else {
                            foreach ($dbh->query("select a.foto, a.prontuario, a.nome,a.curso, r.hora, a.cartao
									   from aluno as a inner join registro as r on a.cartao = r.dado
                                       ORDER BY r.id DESC LIMIT 1") as $linha) {
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
                                echo "{$linha['curso']}";
                                echo "</td>";
								echo "<td>";
                                echo "{$linha['cartao']}";
                                echo "</td>";
                                echo "<td>";
                                echo "{$linha['hora']}";
                                echo "</td>";
                            }
                        }
                        ?>                     
                    </tr>
                </tbody>
            </table>
        </div>

    </body>
</html>