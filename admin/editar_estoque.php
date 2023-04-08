<?php
require 'conexao.php';

//---
require_once('class/db.class.php');
require_once('class/valida.class.php');
require_once('class/usuario.class.php');

// Somente usuários logados podem acessar esta página

// Protege a página
//require_once('protege.php');
///////////////////

//Definimos o error_reporting para ser 0 para nenhum ser erro é reportado. Caso contrário use 1

ini_set("display_errors", "0");
error_reporting(E_ALL);
//include 'error.php';

// Recebe o id do cliente do cliente via GET
$id_registro = (isset($_GET['id_registro'])) ? $_GET['id_registro'] : '';
// Recebe o id do cliente do cliente via GET
//$id_pedido = (isset($_GET['id_pedido'])) ? $_GET['id_pedido'] : '';

// Valida se existe um id e se ele é numérico
if (!empty($id_registro) && is_numeric($id_registro)) :

    // Captura os dados do cliente solicitado
    $conexao = conexao::getInstance();
    $sql = "SELECT * from tb_estoque where id_registro = :id_registro";
    $stm = $conexao->prepare($sql);
    $stm->bindValue(':id_registro', $id_registro);
    $stm->execute();
    $estoque = $stm->fetch(PDO::FETCH_OBJ);

    //   echo var_dump($cliente) . "<br>";

    $id_produto = $estoque->id_produto;

    //echo "<pre>", print_r($estoque, 1), "</pre>";
    // Valida se existe um id e se ele é numérico
    //(!empty($id_pedido) && is_numeric($id_pedido)):

    // Captura os dados do cliente solicitado
    $conexao = conexao::getInstance();
    $sql = "SELECT  
    pd.id_pedido, 
    pd.nome_pedido, 
    pd.tamanho_pedido, 
    pd.email_pedido, 
    pd.quantidade, 
    pd.cel_pedido, 
    pd.comprovante, 
    pd.id_produto, 
    pd.status, 
    pd.situacao, 
    pd.observacao,
    pd.data_pedido, 
    pdt.id_produto, 
    pdt.foto_produto, 
    pdt.descricao, 
    pdt.nome_produto, 
    pdt.preco
    FROM tb_pedido pd
    inner join
    tb_produto pdt
    on pd.id_produto=pdt.id_produto
	inner join
    tb_estoque te
	on te.id_produto=pdt.id_produto
    where pd.id_produto = :id_produto";
    $stm = $conexao->prepare($sql);
    $stm->bindValue(':id_produto', $id_produto);
    $stm->execute();
    $cliente = $stm->fetch(PDO::FETCH_OBJ);


    $usuario = new usuario();
    $dados = $usuario->usuarioInfo($_SESSION['idusuario']);

    //---

?>


    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <title>Editar Pedido</title>
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
            <h1>Editar Produto do Estoque</h1>
        </div>
    </div>
    <hr>


    <div class='container'>
        <fieldset>
            <div class="row">

                <form class="form-group" action="action_estoque.php" method="post" id='form-contato' enctype='multipart/form-data'>
                    <div class="col-lg-6">
                        <label for="nome" style="font-size: 20px; margin-top: 10px;">Alterar Foto</label>
                        <div class="col-md-12">
                            <a href="#" class="thumbnail">

                                <img src="images/<?= $estoque->foto_produto ?>" height="" width="50%" id="foto_produto">
                            </a>
                        </div>
                        <input type="file" type="file" name="foto" id="foto" accept="image/png, image/jpeg, image/jpg, image/svg">
                    </div>



                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="data" style="font-size: 20px; margin-top: 10px;">Data</label>
                            <input type="text" class="form-control" placeholder="Informe a data" value="<?= $estoque->data ?>" disabled>
                            <span class='msg-erro msg-data'></span>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <p style="font-size: 20px; margin-top: 10px;"><b>Resumo:</b> <span><span></p>
                        <p style="font-size: 20px; margin-top: 15px;"><b>Código:</b> <span><?= $estoque->id_produto ?> <span></p>
                        <p style="font-size: 20px; margin-top: 10px;"><b>Nome:</b> <span><?= $estoque->nome_produto ?> <span></p>
                        <p style="font-size: 20px; margin-top: 10px;"><b>Tamanho:</b> <span><?= $estoque->tamanho_produto ?> <span></p>
                        <p style="font-size: 20px; margin-top: 10px;"><b>Quantidade:</b> <span><?= $estoque->quantidade ?> <span></p>

                    </div>



            </div>


            <div class="row">



                <p style=" margin-top: 25px;">
                    <legend>Editar Produto do Estoque</legend>
                </p>



                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="id_produto">Codigo do Produto: </label>
                        <input type="text" class="form-control" id="id_produto" name="id_produto" placeholder="Informe o nome do produto" value="<?= $estoque->id_produto ?>">
                        <span class='msg-erro msg-tp-id_produto'></span>
                    </div>
                </div>



                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="nome_produto">Nome do Produto: </label>
                        <input type="text" class="form-control" id="nome_produto" name="nome_produto" placeholder="Informe o nome do produto" value="<?= $estoque->nome_produto ?>">
                        <span class='msg-erro msg-tp-nome_produto'></span>
                    </div>
                </div>




                <div class="col-lg-6">
                    <label for="tamanho_produto">Tamanho</label>
                    <select class="form-control" name="tamanho_produto" id="tamanho_produto">
                        <option value="<?= $estoque->tamanho_produto ?>"><?= $estoque->tamanho_produto ?></option>
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
                        <input type="text" class="form-control" id="quantidade" name="quantidade" placeholder="Informe a Quantidade" value="<?= $estoque->quantidade ?>">
                        <span class='msg-erro msg-quantidade'></span>
                    </div>
                </div>



            </div>




            <br><br>
            <div class="row">
                <div class="col-lg-4">
                    <input type="hidden" name="acao" value="editar_produto">
                    <input type="hidden" name="id_registro" value="<?= $estoque->id_registro ?>">
                    <input type="hidden" name="data" value="<?= date('d/m/Y'); ?>">
                    <button type="submit" class="btn btn-primary" id='botao'>
                        Salvar
                    </button>
                    <a href='index.php' class="btn btn-danger">Cancelar</a>
                </div>
            </div>


            </form>



            <!--?php endif; ?-->
        </fieldset>

    <?php endif; ?>

    </div>

    </html>