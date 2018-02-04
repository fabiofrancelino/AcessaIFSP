<?php
require_once('navBar.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Acessa IFSP</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <script src="bootstrap/js/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <style>
            .carousel-inner > .item > img,
            .carousel-inner > .item > a > img {
                width: 70%;
                margin: auto;
            }
        </style>

    </head>
    <body>




        <div class="container">
            <div class="row">
                <div class="jumbotron">
                    <h1>Bem vindos!</h1>
                    <p>Sistema de controle de entrada do Instituto Federal.</p> 
                </div> 

                <div class="container">
                    <br>
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                            <li data-target="#myCarousel" data-slide-to="3"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">

                            <div class="item active">
                                <img src="img/logotipo1.jpg" alt="Chania" width="460" height="345">
                                <div class="carousel-caption">
                                </div>
                            </div>

                            <div class="item">
                                <img src="img/entrada.jpg" alt="Chania" width="460" height="345">
                                <div class="carousel-caption">
                                </div>
                            </div>

                            <div class="item">
                                <img src="img/entrada2.jpg" alt="Flower" width="460" height="345">
                                <div class="carousel-caption">
                                </div>
                            </div>

                        </div>

                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>





                <div class="col-sm-4">
                    <h3>Funções</h3>
                    <p>Realize o cadastro, atualização e manutenção de registro dos alunos...</p>
                </div>


                <div class="col-sm-4">
                    <h3>Problemas?</h3>
                    <p>Caso algum problema seja encontrado pedimos aos usuarios que entrem em contato com os desenvolvedores:</p>
                    <p>e-mail: acessaifsp@ifsp.edu.br</p>
                </div>


            </div>
        </div>

    </body>
</html>