<?php

require_once('class/db.class.php');
require_once('class/valida.class.php');
require_once('class/usuario.class.php');

if (($_SERVER['REQUEST_METHOD'] == 'POST')) {
    $usuario = new usuario();
    $usuario->validaLogin($_POST);
    if(@$_SESSION['logado']){
        if(@$_SESSION['idusuario'] === '1') {
            header ('location: index.php?pagina=consulta');
        } else {
            header ('location: index.php?pagina=home');
        }
    }
    else {
        $erro = "Login inválido!";
    }
}


?>  


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>HOME</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<div class="container">
    <div class="row">



        <form class="pure-form pure-form-stacked" method="post"  >
        <!--action="index.php?pagina=consulta"-->
            <fieldset>

                <div align="center">
                <div class="col" style="margin-top:30px;">
                    <img src="img/instituto.png" width="30%" height="" alt="Instagram" style=" margin-top: 10px;">    
                </div>
                <div class="row"  style="width: 250px;">
                <h1>Login</h1>
                    <p style="color: red"><b><?php echo @$erro; ?></b></p>
                 
                    <label for="email">Email:</label>
                    <input id="email" class="form-control" name="email" type="email" placeholder="Email" value="<?= @$_POST['email'] ?>">
                    
                    <label for="password">Senha:</label>
                    <input id="senha" class="form-control" name="senha" type="password" placeholder="Senha" require>

                    <label for="remember" class="pure-checkbox">
                        <input id="cookies" name="cookies" type="checkbox" checked> Mantenha-me conectado
                    </label>
                    <div class='col-md-12' style="margin-top: 1pt;">                
                        <button type="button" class="btn btn-default btn-sm"><a href='index.php?pagina=cadastro_publico'>Novo por aqui? Cadastre-se já!</a></button>
                    </div>
                    <div> </div>
                    <div class='col-md-12'  style="margin-top: 10pt;">
                        <button type="button" class="btn btn-danger btn-sm"><a href='index.php'></a>Voltar</button>
                        <button type="submit" class="btn btn-primary btn-sm " >Entrar</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
    </div>
    </div>
</html>

