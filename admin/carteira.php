<?php
require 'conexao.php';

//Definimos o error_reporting para ser 0 para nenhum ser erro é reportado. Caso contrário use 1

ini_set("display_errors", "1");
error_reporting(E_ALL);
//include 'error.php';

// Recebe o id do cliente do cliente via GET
$id_cliente = (isset($_GET['id'])) ? $_GET['id'] : '';

// Valida se existe um id e se ele é numérico
if (!empty($id_cliente) && is_numeric($id_cliente)):

	// Captura os dados do cliente solicitado
	$conexao = conexao::getInstance();
	$sql = 'SELECT id, foto, carteirinha, pl_saude, nome, sexo, dt_nascimento, email, tp_sanguineo, ft_rh, peso, altura, pai, mae, telefone, celular, endereco, alergia, coracao, respiracao, especial, outros, observacao, proximo, tel_proximo, cel_proximo, adesao, senha , rg, cpf FROM tab_instituto WHERE id = :id';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':id', $id_cliente);
	$stm->execute();
	$cliente = $stm->fetch(PDO::FETCH_OBJ);


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
    <title>Carteirinha de Membros</title>
    <!--<link rel="stylesheet" href="css/pure-min.css">-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <style>
    * {
        margin: 0px;
        padding: 0px;
    }

    .bg {
        z-index:-1;
        background-image: url("fotos/CARTEIRINHA2.svg");
        background-repeat: no-repeat;
        background-position: center;
        height: 1000px;
        margin-top: 5px;
    }

    .ftid {
        position: relative;
        transform: rotate(90deg);
        width: 21rem;
        height: 29rem;
        margin-left: 4rem;
    }

    .parte-cima {
        margin-top: 8rem;
    }

    .parte-baixo {
        margin-top: 10rem;
        padding: 0rem 25rem 5rem 25rem;
    }

    @media only screen and (max-width: 1199px) {
        .parte-baixo {
            margin-top: 15rem;
            padding: 0rem 15rem 5rem 15rem;
        }
    }

    @media only screen and (max-width: 991px) {
        .parte-baixo {
            margin-top: 15rem;
            padding: 0rem 4rem 5rem 4rem;
        }
    }

    .nome {
        text-align: center;
        margin-top: 1rem;
    }

    .botoes {
        text-align: center; 
        padding-bottom: 1rem;
    }

    </style>

</head>

<body>
    <div class="container" style="font-family:Courier; font-size: 16px;">
        <div class="row bg">
            <div class="col-lg-12">
                <div class="row parte-cima">
                    <div class="col-lg-6 col-sm-6 col-md-6"></div>
                    <div class="col-lg-6 col-sm-6 col-md-6">
                        <img src="fotos/<?= empty($cliente->foto) ? 'padrao.jpg' : $cliente->foto ?>" class="ftid">
                    </div>
                    <div class="col-lg-12 col-sm-12 col-md-12 nome">
                        <label><?=strtoupper($cliente->nome)?> </label>
                    </div>
                </div>

                <div class="row parte-baixo">
                    <div class="col-lg-12">
                    
                        <div class="row col-lg-6 col-sm-6 col-md-6">
                            <label>PLANO/SUS: </label>
                            <?=strtoupper($cliente->carteirinha)?>
                        </div>
                        <div class="row col-lg-6 col-sm-6 col-md-6">
                            <label>PLANO DE SAUDE: </label>
                            <?=strtoupper($cliente->pl_saude)?>
                        </div>

                        <div class="row col-lg-6 col-sm-6 col-md-6">
                            <label>RG: </label>
                            <?=strtoupper($cliente->rg)?>
                        </div>
                        <div class="row col-lg-6 col-sm-6 col-md-6">
                            <label>CPF: </label>
                            <?=strtoupper($cliente->cpf)?>
                        </div>
                    

                        
                            <div class="row col-lg-7 col-sm-7 col-md-7">
                                <label>EMAIL: </label>
                                <?=strtoupper($cliente->email)?>
                            </div>

                        
                        <div class="row col-lg-12 col-sm-12 col-md-12">
                            <label>FILIAÇÃO: </label>
                            <div>
                                <?=strtoupper($cliente->mae)?>
                            </div>
                            <div>
                                <?=strtoupper($cliente->pai)?>
                            </div>
                        </div>
                        
                        <div class="row  col-lg-6 col-sm-6 col-md-6">
                                <label>SEXO: </label>
                                <?=strtoupper($cliente->sexo)?>
                            </div>

                        <div class="row  col-lg-6 col-sm-6 col-md-6">
                                <label>NASCIMENTO: </label>
                                <?php $date1 = strtr($cliente->dt_nascimento, '/', '-'); ?>
                                <?=date('d/m/Y', strtotime($date1))?>
                         </div>                           

                       

                            <div class="row  col-lg-3 col-sm-3 col-md-3">
                                <label>PESO: </label>
                                <?=strtoupper($cliente->peso)?>
                            </div>
                            <div class="row  col-lg-3 col-sm-3 col-md-3">
                                <label>ALTURA: </label>
                                <?=strtoupper($cliente->altura)?>
                            </div>
                           
                            <div class="row col-lg-6 col-sm-4 col-md-4">
                                <label>TIPO SANGUINEO: </label>
                                <?=strtoupper($cliente->tp_sanguineo)?>
                                <?=strtoupper($cliente->ft_rh)?>
                            </div>
                        
                        <div class="row col-lg-12 col-sm-12 col-md-12">
                            <label>END.: </label>
                            <?=strtoupper($cliente->endereco)?>
                        </div>
                       
                        <div class="row col-lg-6 col-sm-6 col-md-6">
                            <label>CELULAR: </label>
                            <?=strtoupper($cliente->celular)?>
                        </div>
                        <div class="row col-lg-6 col-sm-6 col-md-6">
                            <label>TELEFONE: </label>
                            <?=strtoupper($cliente->telefone)?>
                        </div>
                       
                       
                        <div class="row col-lg-12 col-sm-12 col-md-12">
                            <label>CONTATO: </label>
                            <?=strtoupper($cliente->proximo)?>
                        </div>
                        <div class="row col-lg-12 col-sm-12 col-md-12">
                            <label>CELULAR(ES): </label>
                            <?=strtoupper($cliente->tel_proximo)?>
                            <?=strtoupper($cliente->cel_proximo)?>
                        </div>
                        <div class="row col-lg-12 col-sm-12 col-md-12">
                            <label>OBS.: </label>
                            <?=strtoupper($cliente->observacao)?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row botoes">
            <div class="col-lg-12">
                <button type="button" class="btn btn-danger" onClick="history.go(-1)">Voltar</button>
                <button type="button" class="btn btn-success" onClick="window.print()">Imprimir</button>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/custom.js"></script>
</body>
</html>
