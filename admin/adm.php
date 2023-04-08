
<?php

require_once('class/db.class.php');
require_once('class/valida.class.php');
require_once('class/usuario.class.php');

// Somente o administrador pode ter acesso a esta página.
// O administrador é o primeiro usuário cadastrado, ou seja, o usuário com id = 1
// Protege a página
require_once('protege.php');
///////////////////

// $usuario_sessao = new usuario();
// $no_sessao_usuario = $usuario_sessao->usuarioInfo($_SESSION['idusuario']);

$usuario = new usuario();
$dados = $usuario->usuarioInfo($_SESSION['idusuario']);

if (@$_SESSION['idusuario'] != 1)
    header('Location: login.php');


$usuario = new usuario;
$dados = $usuario->todosUsuariosInfo();
?>

<!DOCTYPE html>
<html>
<div align="right">
<p>Bem Vindo(a), <?= $no_sessao_usuario['nome'] ?> <a href="logout.php">! &nbsp; Sair &nbsp;</a> </p>
    <head>
    <meta charset="utf-8">
    <title>Gerenciamento de administradores</title>
    <link rel="stylesheet" href="css/pure-min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <div align='center'><img src='fotos/logo.jpg' width="130" alt='logo BRAVOS'></div>
        
    </head>

    <body>

        <div style="margin-left: 20%; margin-right: 20%;">
            <h3>Gerenciamento de usuários administrativos - BRAVOSCAP</h3>
            <hr> </hr>

            <table class="pure-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Sobrenome</th>
                        <th>Email</th>
                        <th>Último Acesso</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
<?php $i = 0;
foreach ($dados as $usuario): ?>
                        <?php if ($i == 0): $i++ ?>
                            <tr class="pure-table-odd">
                                <td><?= $usuario['idusuario'] ?></td>
                                <td><?= $usuario['nome'] ?></td>
                                <td><?= $usuario['sobrenome'] ?></td>
                                <td><?= $usuario['email'] ?></td>
                                <td><?= $usuario['ultimoAcesso'] ?></td>
                                <td><a href="alterar.php?idusuario=<?= $usuario['idusuario'] ?>"> <img src="img/editar.png" /> </a> <a href="deletar.php?idusuario=<?= $usuario['idusuario'] ?>" class="confirmacao"> <img src="img/remover.png" /> </a></td>
                            </tr>
                        <?php else: $i-- ?>

                            <tr>
                                <td><?= $usuario['idusuario'] ?></td>
                                <td><?= $usuario['nome'] ?></td>
                                <td><?= $usuario['sobrenome'] ?></td>
                                <td><?= $usuario['email'] ?></td>
                                <td><?= $usuario['ultimoAcesso'] ?></td>
                                <td><a href="alterar.php?idusuario=<?= $usuario['idusuario'] ?>"> <img src="img/remover.png" /> </a> <a href="deletar.php?idusuario=<?= $usuario['idusuario'] ?>" class="confirmacao"> <img src="img/remover.png" /> </a></td>
                            </tr>

                        <?php endif; ?>
                    <?php endforeach; ?>

                </tbody>
            </table>
            
            <script type="text/javascript">
            var elems = document.getElementsByClassName('confirmacao');
            var confirmIt = function (e) {
            if (!confirm('Tem certeza ?')) 
                e.preventDefault();
            };
            for (var i = 0, l = elems.length; i < l; i++) {
                elems[i].addEventListener('click', confirmIt, false);
            }
            </script>

           
        </div>

    </body>



</html>