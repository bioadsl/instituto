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
<html lang="en">

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
    <style>
        /* Table Base */

        table {
            font-family: arial;
            max-width: 100%;
            background-color: transparent;
            border-collapse: collapse;
            border-spacing: 0;
        }

        .table {
            width: 100%;
            margin-bottom: 20px;
        }

        .table th,
        .table td {
            font-weight: normal;
            font-size: 12px;
            padding: 8px 15px;
            line-height: 20px;
            text-align: left;
            vertical-align: middle;
            border-top: 1px solid #dddddd;
        }

        .table thead th {
            background: #eeeeee;
            vertical-align: bottom;
        }

        .table tbody>tr:nth-child(odd)>td,
        .table tbody>tr:nth-child(odd)>th {
            background-color: #fafafa;
        }

        .table .t-small {
            width: 5%;
        }

        .table .t-medium {
            width: 15%;
        }

        .table .t-status {
            font-weight: bold;
        }

        .table .t-active {
            color: #46a546;
        }

        .table .t-inactive {
            color: #e00300;
        }

        .table .t-draft {
            color: #f89406;
        }

        .table .t-scheduled {
            color: #049cdb;
        }

        /* Small Sizes */
        @media (max-width: 480px) {
            .table-action thead {
                display: none;
            }

            .table-action tr {
                border-bottom: 1px solid #dddddd;
            }

            .table-action td {
                border: 0;
            }

            .table-action td:not(:first-child) {
                display: block;
            }
        }
    </style>
</head>
<?php include 'menu.php'; ?>
<div class='container'>
    <div class="row">
        <div class="col-lg-8" style="margin-top: 30px;">
            <h1>Cadastro de Item</h1>
        </div>
    </div>
    <hr>
    <fieldset>
        <?php if (empty($cliente)) : ?>
            <h3 class="text-center text-danger">Item não encontrado!</h3>
        <?php else : ?>
            <!--inicio produtos-->

            <div class="row">

                <form class="form-group" action="action_inventario.php" method="post" id='form-contato' enctype='multipart/form-data'>



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

        <?php endif; ?>
        <!---fim dos produtos-->

        <legend>Dados de item de inventario</legend>

        <div class="row">

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="id_produto">Codigo: </label>
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
                </select>
                <span class='msg-erro msg-tamanho_produto'></span>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="quantidade">Quantidade</label>
                    <input type="text" class="form-control" id="quantidade" name="quantidade" placeholder="Informe a Quantidade">
                    <span class='msg-erro msg-quantidade'></span>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <input type="text" class="form-control" id="categoria" name="categoria" placeholder="Informe a categoria">
                    <span class='msg-erro msg-categoria'></span>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="local">Local</label>
                    <input type="text" class="form-control" id="local" name="local" placeholder="Informe o local">
                    <span class='msg-erro msg-local'></span>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="estado">Estado de conservação</label>
                    <input type="text" class="form-control" id="estado" name="estado" placeholder="Informe o estado ">
                    <span class='msg-erro msg-estado'></span>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="saida">Data de saida</label>
                    <input type="text" class="form-control" id="saida" name="saida" placeholder="Informe a data de saida ">
                    <span class='msg-erro msg-saida'></span>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="responsavel">Responsavel</label>
                    <input type="text" class="form-control" id="responsavel" name="responsavel" placeholder="Informe o responsavel ">
                    <span class='msg-erro msg-responsavel'></span>
                </div>
            </div>

        </div>

        <div class="row" style="margin-top:2%;">
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
</div>
</fieldset>

</html>