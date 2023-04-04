<?php
//Definimos o error_reporting para ser 0 para nenhum ser erro é reportado. Caso contrário use 1

ini_set("display_errors", "0");
error_reporting(E_ALL);
/*include 'error.php';
*/


require_once('class/db.class.php');
require_once('class/valida.class.php');
require_once('class/usuario.class.php');
require_once('protege.php');
$usuario = new usuario();
$dados = $usuario->usuarioInfo($_SESSION['idusuario']);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
        <title>Administrativo - Alterar Usuário ADM</title>
        <link rel="stylesheet" href="css/pure-min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/custom.css">
        <div align='center'><img src="./fotos/logo.jpg" width="130" alt="logo BRAVOS" style="margin-left:100px;"></div>
    </head>
    <div align="center">
        <?php
        session_start();
        if (($_SERVER['REQUEST_METHOD'] == 'POST')) {
            $usuario = new usuario();
            $retorno = $usuario->editar($_POST);
            $id = $_POST['idusuario'];
            $dados = $_POST;
        } else {
            if ($_SESSION['idusuario'] == 1 && isset($_GET['idusuario']))
                $id = $_GET['idusuario'];
            else
                $id = $_SESSION['idusuario'];

            $usuario = new usuario();
            $dados = $usuario->usuarioInfo($id);
        }
        ?>
        <?php if (@$retorno['sucesso'] == true): ?>
            <p>Cadastro Atualizado com sucesso!</p>
        <?php else: ?>
            <form class="pure-form pure-form-aligned" method="post">
                <input type="hidden" name="idusuario" value="<?= $id ?>" />
                <fieldset>
                    <legend style="margin-left: 0%;"> <h2>Administrativo - Alterar Usuário ADM</h2> </legend>
                    <div class="pure-control-group">
                        <label for="nome">Nome</label>
                        <input id="nome" name="nome" type="text" placeholder="Primeiro Nome" value="<?= @$dados['nome'] ?>"> <?= @$retorno['nome'] ?>
                        </div>
                        <div class="pure-control-group">
                        <label for="sobrenome">Sobrenome</label>
                        <input id="sobrenome" name="sobrenome" type="text" placeholder="Sobrenome" value="<?= @$dados['sobrenome'] ?>"> <?= @$retorno['sobrenome'] ?>
                    </div>
                    <div class="pure-control-group">
                        <label for="telefone">Telefone</label>
                        <input id="telefone" name="telefone" type="text" onkeyup="this.value = this.value.replace(/[^0-9]/g, '');" placeholder="Somente Números" value="<?= @$dados['telefone'] ?>"> <?= @$retorno['telefone'] ?>
                    </div>
                    <div class="pure-control-group">
                        <label for="cidade">Cidade</label>
                        <input id="cidade" name="cidade" type="text" placeholder="Cidade" value="<?= @$dados['cidade'] ?>"> <?= @$retorno['cidade'] ?>
                        </div>
                    <div class="pure-control-group">
                        <label for="estado">Estado</label>
                        <select id="estado" name="estado" value="<?= @$dados['estado'] ?>">
                            <option value=""></option>
                            <option value="ac">Acre</option>
                            <option value="al">Alagoas</option>
                            <option value="am">Amazonas</option>
                            <option value="ap">Amapá</option>
                            <option value="ba">Bahia</option>
                            <option value="ce">Ceará</option>
                            <option value="df">Distrito Federal</option>
                            <option value="es">Espirito Santo</option>
                            <option value="go">Goiás</option>
                            <option value="ma">Maranhão</option>
                            <option value="mg">Minas Gerais</option>
                            <option value="ms">Mato Grosso do Sul</option>
                            <option value="mt">Mato Grosso</option>
                            <option value="pa">Pará</option>
                            <option value="pb">Paraíba</option>
                            <option value="pe">Pernambuco</option>
                            <option value="pi">Piauí</option>
                            <option value="pr">Paraná</option>
                            <option value="rj">Rio de Janeiro</option>
                            <option value="rn">Rio Grande do Norte</option>
                            <option value="ro">Rondônia</option>
                            <option value="rr">Roraima</option>
                            <option value="rs">Rio Grande do Sul</option>
                            <option value="sc">Santa Catarina</option>
                            <option value="se">Sergipe</option>
                            <option value="sp">São Paulo</option>
                            <option value="to">Tocantins</option>
                        </select> <?= @$retorno['estado'] ?>
                    </div>
                    <div class="pure-control-group">
                        <label for="cep">CEP</label>
                        <input id="cep" name="cep" type="text" onkeyup="this.value = this.value.replace(/[^0-9]/g, '');" placeholder="Somente Números" value="<?= @$dados['cep'] ?>"> <?= @$retorno['cep'] ?>
                    </div>

                    <div class="pure-control-group">
                        <label for="email">Email</label>
                        <input id="email" name="email" type="email" placeholder="contato@blog.masterdaweb.com" value="<?= @$dados['email'] ?>"> <?= @$retorno['email'] ?>
                    </div>

                    <div class="pure-control-group">
                        <label for="senha">Senha</label>
                        <input id="senha" name="senha" type="password" placeholder="Senha"> <?= @$retorno['senha'] ?>
                    </div>

                    <div class="pure-controls">
                        <button type="submit" class="btn btn-primary">Editar</button>
                        <a href='index.php?pagina=consulta_adm' class="btn btn-danger">Voltar</a>
                    </div>
                </fieldset>
            </form>
        <?php endif; ?>
</div>
</html>
