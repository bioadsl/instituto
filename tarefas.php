<?php
//---
require_once('class/db.class.php');
require_once('class/valida.class.php');
require_once('class/usuario.class.php');

// Somente usuários logados podem acessar esta página

// Protege a página
require_once('protege.php');
///////////////////

$usuario = new usuario();
$dados = $usuario->usuarioInfo($_SESSION['idusuario']);

//---

?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <title>Tarefas</title>
    <link rel="stylesheet" href="css/pure-min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
   </head>


    </head>
    <body>
<div align="center">
    <legend>Tarefas de casa</legend>
            <div class="row">
                <div class="col-sm-6">
                    <a href="?pagina=civismo" class="btn btn-default">
                    <img  src="images/civismo.JPG" width="90%" height=""></a> 
                </div>
                
                <div class="col-sm-6">
                   <a href="?pagina=hinos_cancoes" class="btn btn-default">
                    <img src="images/hinos_e_cancoes.jpg" width="90%" height=""> </a>
                
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <a href="?pagina=xadrez" class="btn btn-default">
                    <img  src="images/xadrez.jpg" width="90%" height=""></a> 
                </div>
                
                
                <div class="col-sm-6">
                    <a href="?pagina=nos" class="btn btn-default">
                        <img src="images/nos1.jpg" width="90%" height=""> </a>
                </div>
                <marquee>Atenção senhores, façam as novas tarefas de casa de Nós, Amarrações 1 e Xadrez 1!</marquee>
            </div>




</div>
    </body>

</html>