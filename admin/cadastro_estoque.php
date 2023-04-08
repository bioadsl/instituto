<?php
require 'conexao.php';

//Definimos o error_reporting para ser 0 para nenhum ser erro é reportado. Caso contrário use 1

ini_set("display_errors", "0");
error_reporting(E_ALL);
//include 'error.php';

// Recebe o id do cliente do cliente via GET
//$id_cliente = (isset($_GET['id'])) ? $_GET['id'] : '';

// Valida se existe um id e se ele é numérico
//if (!empty($id_produto) && is_numeric($id_produto)):

// Captura os dados do cliente solicitado
$conexao = conexao::getInstance();
$sql = 'SELECT `id_produto`, `foto_produto`, `descricao`, `nome_produto`, `preco` FROM `tb_produto`';
//WHERE id_produto = :id_produto';
$stm = $conexao->prepare($sql);
//$stm->bindValue(':id_produto', $id_produto);
$stm->execute();
$cliente = $stm->fetch(PDO::FETCH_OBJ);
$pdo = null;


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

if (@$_SESSION['idusuario'] != 1)
    header('Location: login.php');







?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Estoque</title>
    <!--<link rel="stylesheet" href="css/pure-min.css">-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<div class="row">
    <div class="col-lg-4">
        <img src='./fotos/logo.jpg' width="130" alt='logo BRAVOS' style="margin-left:100px;">
    </div>
    <div class="col-lg-8" style="margin-top: 30px;">
        <h1>Estoque</h1>
    </div>
</div>
<hr>
<div class='container'>
    <fieldset>
        <?php if (empty($cliente)) : ?>
            <h3 class="text-center text-danger">Produto não encontrado!</h3>
        <?php else : ?>
            <!--inicio produtos-->

            <div class="row">

                <form class="form-group" action="action_estoque.php" method="post" id='form-contato' enctype='multipart/form-data'>



                    <div class="col-lg-6">
                        <label for="nome">Foto produto</label>
                        <div class="col-md-4">
                            <a href="#" class="thumbnail">

                                <img src="images/padrao.jpg" height="190" width="150" id="foto_produto">
                            </a>
                        </div>
                        <input type="file" type="file" name="foto" id="foto" accept="image/png, image/jpeg, image/jpg, image/svg">
                    </div>


                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="data">Data</label>
                            <input type="text" class="form-control" placeholder="Informe a data" value="<?php echo date('d/m/Y'); ?>" disabled>
                        </div>
                    </div>


            </div>
</div>
<?php endif; ?>
<!---fim dos produtos-->


<legend>Pedido do Uniforme</legend>




<div class="row">




    <div class="col-lg-6">
        <div class="form-group">
            <label for="id_produto">Codigo do Produto: </label>
            <input type="text" class="form-control" id="id_produto" name="id_produto" placeholder="Informe o nome do produto">
            <span class='msg-erro msg-tp-id_produto'></span>
        </div>
    </div>



    <div class="col-lg-6">
        <div class="form-group">
            <label for="nome_produto">Nome do Produto: </label>
            <input type="text" class="form-control" id="nome_produto" name="nome_produto" placeholder="Informe o nome do produto">
            <span class='msg-erro msg-tp-nome_produto'></span>
        </div>
    </div>



    <div class="col-lg-6">
        <label for="tamanho_produto">Tamanho</label>
        <select class="form-control" name="tamanho_produto" id="tamanho_produto">
            <option value="">Selecione o Tamanho</option>
            <option value="P">P</option>
            <option value="M">M</option>
            <option value="G">G</option>
            <option value="XG">XG</option>
            <option value="6 anos">6 anos</option>
            <option value="8 anos">8 anos</option>
            <option value="10 anos">10 anos</option>
            <option value="12 anos">12 anos</option>
        </select>
        <span class='msg-erro msg-tamanho_produto'></span>
    </div>

    <div class="col-lg-6">
        <div class="form-group">
            <label for="quantidade">Quantidade</label>
            <input type="numer" class="form-control" id="quantidade" name="quantidade" placeholder="Informe a Quantidade">
            <span class='msg-erro msg-quantidade'></span>
        </div>
    </div>




</div>

<div class="row">
    <div class="col-lg-4">
        <input type="hidden" name="acao" value="incluir_produto">
        <input type="hidden" name="data" value="<?php echo date('d/m/Y'); ?>">
        <button type="submit" class="btn btn-primary" id='botao'>
            Gravar
        </button>
        <a href='?pagina=consulta_estoque' class="btn btn-danger">Voltar</a>
    </div>
</div>
</form>

</fieldset>

</html>