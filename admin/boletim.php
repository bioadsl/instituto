<?php
require 'conexao.php';

//Definimos o error_reporting para ser 0 para nenhum ser erro é reportado. Caso contrário use 1

ini_set("display_errors", "0");
error_reporting(E_ALL);
//include 'error.php';

//inner join tb_matricula as m  a1.id_instituto=m.id_instituto 
$id_cliente = (isset($_GET['id'])) ? $_GET['id'] : '';

// Captura os dados do cliente solicitado
$conexao = conexao::getInstance();
$sql = 'SELECT *  FROM tab_bravos WHERE id = :id';
$stm = $conexao->prepare($sql);
$stm->bindValue(':id', $id_cliente);
$stm->execute();
$cliente = $stm->fetch(PDO::FETCH_OBJ);

// Captura os dados do atendimento solicitado
$conexao1 = conexao::getInstance();
$sql = 'SELECT `id_matricula`, `cod_matricula`, `turma`, `data`, `id_instituto`, `nome`, `status` FROM `tb_matricula` WHERE id_instituto = :id';
$stm = $conexao1->prepare($sql);
$stm->bindValue(':id', $id_cliente);
$stm->execute();
$matricula = $stm->fetch(PDO::FETCH_OBJ);

// Captura os dados do atendimento solicitado
$conexao = conexao::getInstance();
$sql = 'SELECT `id_grade1`, `id_instituto`, `matricula`, `turma`, `data`, `nome`, `civismo1`, `nos_amarras1`, `xadrez1`, `sobrevivencia1`, `orientacao1`, `ordem_unida1`, `habilidades1`, `taf1`, `prim_socorros1`, `prev_acidentes1` FROM `tb_grade1` WHERE id_instituto = :id';
$stm = $conexao->prepare($sql);
$stm->bindValue(':id', $id_cliente);
$stm->execute();
$grade1 = $stm->fetch(PDO::FETCH_OBJ);


// Captura os dados do atendimento solicitado
$conexao = conexao::getInstance();
$sql = 'SELECT `id_grade2`, `id_instituto`, `matricula`, `turma`, `data`, `nome`, `civismo2`, `nos_amarras2`, `xadrez2`, `sobrevivencia2`, `orientacao2`, `ordem_unida2`, `habilidades2`, `taf2`, `prim_socorros2`, `prev_acidentes2` FROM `tb_grade2` WHERE id_instituto = :id';
$stm = $conexao->prepare($sql);
$stm->bindValue(':id', $id_cliente);
$stm->execute();
$grade2 = $stm->fetch(PDO::FETCH_OBJ);

$conexao = conexao::getInstance();
$sql = "SELECT a1.id_avaliacao1, a1.id_instituto, a1.matricula, a1.turma, a1.data, a1.nome, a1.obediencia1, a1.respeito1, a1.organizacao1, a1.servico1, a1.ds_escolar1, a1.disciplina1, a1.camaradagem1, a1.iniciativa1, a1.assiduidade1, a1.lideranca1 FROM tb_avaliacao1 as a1 where a1.id_instituto=:id";
$stm = $conexao->prepare($sql);
$stm->bindValue(':id', $id_cliente);
$stm->execute();
$avaliacao1 = $stm->fetch(PDO::FETCH_OBJ);

$conexao = conexao::getInstance();
$sql = "SELECT a2.id_avaliacao2, a2.id_instituto, a2.matricula, a2.turma, a2.data, a2.nome, a2.obediencia2, a2.respeito2, a2.organizacao2, a2.servico2, a2.ds_escolar2, a2.disciplina2, a2.camaradagem2, a2.iniciativa2, a2.assiduidade2, a2.lideranca2 FROM tb_avaliacao2 as a2 where a2.id_instituto=:id";
$stm = $conexao->prepare($sql);
$stm->bindValue(':id', $id_cliente);
$stm->execute();
$avaliacao2 = $stm->fetch(PDO::FETCH_OBJ);


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
    <title>Boletim</title>
    <!--<link rel="stylesheet" href="css/pure-min.css">-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<div class='container'>


    <hr>
    <?php if (empty($cliente)) : ?>
        <h3 class="text-center text-danger">Membro não encontrado!</h3>
    <?php else : ?>

        <div class="row">
            <div style="text-align: center;">
                <h1>Boletim Bravos</h1>
            </div>
            <hr>
            <div class="col-lg-3">
                <img src="fotos/<?= $cliente->foto ?>" height="auto" width="50%" id="foto_produto">
            </div>
            <div class="col-lg-9" style="font-size: 150%; padding-top: 5%;">

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="matricula">Matricula: <?= $matricula->cod_matricula ?></label>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="data">Data:<?= $matricula->data ?></label>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="turma">Turma:<?= $matricula->turma ?> </label>

                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="data_nascimento">Nascimento: <?php $date1 = strtr($cliente->dt_nascimento, '/', '-'); ?> <?= date('d/m/Y', strtotime($date1)) ?> </label>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="nome">Nome: <?= $matricula->nome ?> </label>
                    </div>
                </div>
            </div>
        </div>
</div>



<?php endif; ?>
<?php if (!empty($avaliacao1)) : ?>
    <hr>
    <div class="container">

        <h1> 1º Semestre </h1>


        <div class="table ">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th class="col-sm-auto" colspan="6">Avaliação comportamental pelos <b>Pais/Responsáveis</b> referente ao cotidiano do lar</th>
                        <th class="col-sm-auto" colspan="6">Avaliação comportamental pelos <b>Guardiôes</b> referente aos encontros semanais</th>
                    </tr>
                    <tr class='active'>
                        <th class="col-sm-auto" scope="col">Obediencia</th>
                        <th class="col-sm-auto" scope="col">Respeito</th>
                        <th class="col-sm-auto" scope="col">Organização</th>
                        <th class="col-sm-auto" scope="col">Serviço</th>
                        <th class="col-sm-auto" scope="col">Des. Escolar</th>
                        <th class="col-sm-auto" scope="col">Disciplina</th>
                        <th class="col-sm-auto" scope="col">Camaradagem</th>
                        <th class="col-sm-auto" scope="col">Iniciativa</th>
                        <th class="col-sm-auto" scope="col">Assiduidade</th>
                        <th class="col-sm-auto" scope="col">Liderança</th>
                        <th class="col-sm-auto" scope="col"> <b>Média Comportamental 1</b></th>
                    </tr>
                </thead>


                <tbody>
                    <tr>
                        <th class="col-sm-auto"> <?= $avaliacao1->obediencia1 ?> <?php $obediencia = intval($avaliacao1->obediencia1); ?></td>
                        <th class="col-sm-auto"> <?= $avaliacao1->respeito1 ?> <?php $respeito = intval($avaliacao1->respeito1); ?></td>
                        <th class="col-sm-auto"> <?= $avaliacao1->organizacao1 ?> <?php $organizacao = intval($avaliacao1->organizacao1); ?></td>
                        <th class="col-sm-auto"> <?= $avaliacao1->servico1 ?> <?php $servico = intval($avaliacao1->servico1); ?></td>
                        <th class="col-sm-auto"> <?= $avaliacao1->ds_escolar1 ?> <?php $ds_escolar = intval($avaliacao1->ds_escolar1); ?></td>
                        <th class="col-sm-auto"> <?= $avaliacao1->disciplina1 ?> <?php $disciplina = intval($avaliacao1->disciplina1); ?></td>
                        <th class="col-sm-auto"> <?= $avaliacao1->camaradagem1 ?> <?php $camaradagem = intval($avaliacao1->camaradagem1); ?></td>
                        <th class="col-sm-auto"> <?= $avaliacao1->iniciativa1 ?> <?php $iniciativa = intval($avaliacao1->iniciativa1); ?></td>
                        <th class="col-sm-auto"> <?= $avaliacao1->assiduidade1 ?> <?php $assiduidade = intval($avaliacao1->assiduidade1); ?></td>
                        <th class="col-sm-auto"> <?= $avaliacao1->lideranca1 ?> <?php $lideranca = intval($avaliacao1->lideranca1); ?></td>
                        <th class="col-sm-auto"> <?php $media_subjetiva1 = ($obediencia + $respeito + $organizacao + $servico + $ds_escolar + $disciplina + $camaradagem + $iniciativa + $assiduidade + $lideranca) / 10;
                                                    echo $media_subjetiva1; ?></td>
                    </tr>
                </tbody>
        </div>
        </table>
        <hr>
        <hr>
        <h1> Disciplinas </h1>


        <div class="table ">
            <table class="table table-responsive">

                <thead>
                    <tr class='active'>
                        <th class="col-sm-auto" scope="col"><span style="font-weight:bold"></span></th>
                        <th class="col-sm-auto" scope="col" colspan="6"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="tg-0pky"><span style="font-weight:bold">1º Bimestre</span></td>
                        <td class="tg-6hwt">Ordem Unida 1</td>
                        <td class="tg-6hwt">Habilidades Manuais 1</td>
                        <td class="tg-6hwt">Treinamento Físico 1</td>
                        <td class="tg-6hwt">Primeiros Socorros 1</td>
                        <td class="tg-6hwt">Prevenção de Acidentes 1</td>
                        <td class="tg-6hwt"><b>Média Prática 1</b></th>
                    </tr>

                    <tr>
                        <td class="tg-0pky"><span style="font-weight:bold"></span></td>
                        <td class="tg-6hwt"><?= $grade1->ordem_unida1 ?> <?php $ordem_unida = intval($grade1->ordem_unida1); ?></td>
                        <td class="tg-6hwt"><?= $grade1->habilidades1 ?> <?php $habilidades = intval($grade1->habilidades1); ?></td>
                        <td class="tg-6hwt"><?= $grade1->taf1 ?> <?php $taf = intval($grade1->taf1); ?></td>
                        <td class="tg-6hwt"><?= $grade1->prim_socorros1 ?> <?php $prim_socorros = intval($grade1->prim_socorros1); ?></td>
                        <td class="tg-6hwt"><?= $grade1->prev_acidentes1 ?> <?php $prev_acidentes = intval($grade1->prev_acidentes1); ?></td>
                        <td class="tg-6hwt"> <?php $media_pratica1 = ($ordem_unida + $habilidades + $taf + $prim_socorros + $prev_acidentes) / 5;
                                                echo $media_pratica1; ?></td>
                    </tr>



                    <tr>
                        <td class="tg-0pky"><span style="font-weight:bold">2º Bimestre</span></td>
                        <td class="tg-6hwt">Civismo 1</td>
                        <td class="tg-6hwt">Nós e Amarrações 1</td>
                        <td class="tg-6hwt">Xadrez 1</td>
                        <td class="tg-6hwt">Sobrevivência 1</td>
                        <td class="tg-6hwt">Orientação 1</td>
                        <td class="tg-6hwt"><b>Média Prática 2</b></th>
                    </tr>

                    <tr>
                        <td class="tg-0pky"><span style="font-weight:bold"></span></td>
                        <td class="tg-6hwt"><?= $grade1->civismo1 ?> <?php $civismo = intval($grade1->civismo1); ?></td>
                        <td class="tg-6hwt"><?= $grade1->nos_amarras1 ?> <?php $nos_amarras = intval($grade1->nos_amarras1); ?></td>
                        <td class="tg-6hwt"><?= $grade1->xadrez1 ?> <?php $xadrez = intval($grade1->xadrez1); ?></td>
                        <td class="tg-6hwt"><?= $grade1->sobrevivencia1 ?> <?php $sobrevivencia = intval($grade1->sobrevivencia1); ?></td>
                        <td class="tg-6hwt"><?= $grade1->orientacao1 ?> <?php $orientacao = intval($grade1->orientacao1); ?></td>
                        <td class="tg-6hwt"> <?php $media_pratica2 = ($civismo + $nos_amarras + $xadrez + $sobrevivencia + $orientacao) / 5;
                                                echo $media_pratica2; ?></td>
                    </tr>

                </tbody>
        </div>
        </table>

    <?php endif; ?>

    <hr>


    <?php if (!empty($avaliacao2)) : ?>



        <h1> 2º Semestre </h1>


        <div class="table ">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th class="col-sm-auto" colspan="6">Avaliação comportamental pelos <b>Pais/Responsáveis</b> referente ao cotidiano do lar</th>
                        <th class="col-sm-auto" colspan="6">Avaliação comportamental pelos <b>Guardiôes</b> referente aos encontros semanais</th>
                    </tr>
                    <tr class='active'>
                        <th class="col-sm-auto" scope="col">Obediencia</th>
                        <th class="col-sm-auto" scope="col">Respeito</th>
                        <th class="col-sm-auto" scope="col">Organização</th>
                        <th class="col-sm-auto" scope="col">Serviço</th>
                        <th class="col-sm-auto" scope="col">Des. Escolar</th>
                        <th class="col-sm-auto" scope="col">Disciplina</th>
                        <th class="col-sm-auto" scope="col">Camaradagem</th>
                        <th class="col-sm-auto" scope="col">Iniciativa</th>
                        <th class="col-sm-auto" scope="col">Assiduidade</th>
                        <th class="col-sm-auto" scope="col">Liderança</th>
                        <th class="col-sm-auto" scope="col"> <b>Média Comportamental 2</b></th>
                    </tr>
                </thead>


                <tbody>
                    <tr>
                        <th class="col-sm-auto"> <?= $avaliacao2->obediencia2 ?> <?php $obediencia = intval($avaliacao2->obediencia2); ?></td>
                        <th class="col-sm-auto"> <?= $avaliacao2->respeito2 ?> <?php $respeito = intval($avaliacao2->respeito2); ?></td>
                        <th class="col-sm-auto"> <?= $avaliacao2->organizacao2 ?> <?php $organizacao = intval($avaliacao2->organizacao2); ?></td>
                        <th class="col-sm-auto"> <?= $avaliacao2->servico2 ?> <?php $servico = intval($avaliacao2->servico2); ?></td>
                        <th class="col-sm-auto"> <?= $avaliacao2->ds_escolar2 ?> <?php $ds_escolar = intval($avaliacao2->ds_escolar2); ?></td>
                        <th class="col-sm-auto"> <?= $avaliacao2->disciplina2 ?> <?php $disciplina = intval($avaliacao2->disciplina2); ?></td>
                        <th class="col-sm-auto"> <?= $avaliacao2->camaradagem2 ?> <?php $camaradagem = intval($avaliacao2->camaradagem2); ?></td>
                        <th class="col-sm-auto"> <?= $avaliacao2->iniciativa2 ?> <?php $iniciativa = intval($avaliacao2->iniciativa2); ?></td>
                        <th class="col-sm-auto"> <?= $avaliacao2->assiduidade2 ?> <?php $assiduidade = intval($avaliacao2->assiduidade2); ?></td>
                        <th class="col-sm-auto"> <?= $avaliacao2->lideranca2 ?> <?php $lideranca = intval($avaliacao2->lideranca2); ?></td>
                        <th class="col-sm-auto"> <?php $media_subjetiva2 = ($obediencia + $respeito + $organizacao + $servico + $ds_escolar + $disciplina + $camaradagem + $iniciativa + $assiduidade + $lideranca) / 10;
                                                    echo $media_subjetiva2; ?></td>
                    </tr>
                </tbody>
        </div>
        </table>
        <hr>
        <hr>
        <h1> Disciplinas </h1>


        <div class="table ">
            <table class="table table-responsive">

                <thead>
                    <tr class='active'>
                        <th class="col-sm-auto" scope="col"><span style="font-weight:bold"></span></th>
                        <th class="col-sm-auto" scope="col" colspan="6"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="tg-0pky"><span style="font-weight:bold">3º Bimestre</span></td>
                        <td class="tg-6hwt">Ordem Unida 2</td>
                        <td class="tg-6hwt">Habilidades Manuais 2</td>
                        <td class="tg-6hwt">Treinamento Físico 2</td>
                        <td class="tg-6hwt">Primeiros Socorros 2</td>
                        <td class="tg-6hwt">Prevenção de Acidentes 2</td>
                        <td class="tg-6hwt"><b>Média Prática 3</b></th>
                    </tr>

                    <tr>
                        <td class="tg-0pky"><span style="font-weight:bold"></span></td>
                        <td class="tg-6hwt"><?= $grade2->ordem_unida2 ?> <?php $ordem_unida = intval($grade2->ordem_unida2); ?></td>
                        <td class="tg-6hwt"><?= $grade2->habilidades2 ?> <?php $habilidades = intval($grade2->habilidades2); ?></td>
                        <td class="tg-6hwt"><?= $grade2->taf2 ?> <?php $taf = intval($grade2->taf2); ?></td>
                        <td class="tg-6hwt"><?= $grade2->prim_socorros2 ?> <?php $prim_socorros = intval($grade2->prim_socorros2); ?></td>
                        <td class="tg-6hwt"><?= $grade2->prev_acidentes2 ?> <?php $prev_acidentes = intval($grade2->prev_acidentes2); ?></td>
                        <td class="tg-6hwt"> <?php $media_pratica3 = ($ordem_unida + $habilidades + $taf + $prim_socorros + $prev_acidentes) / 5;
                                                echo $media_pratica3; ?></td>
                    </tr>



                    <tr>
                        <td class="tg-0pky"><span style="font-weight:bold">4º Bimestre</span></td>
                        <td class="tg-6hwt">Civismo 2</td>
                        <td class="tg-6hwt">Nós e Amarrações 2</td>
                        <td class="tg-6hwt">Xadrez 2</td>
                        <td class="tg-6hwt">Sobrevivência 2</td>
                        <td class="tg-6hwt">Orientação 2</td>
                        <td class="tg-6hwt"><b>Média Prática 4</b></th>
                    </tr>

                    <tr>
                        <td class="tg-0pky"><span style="font-weight:bold"></span></td>
                        <td class="tg-6hwt"><?= $grade2->civismo2 ?> <?php $civismo = intval($grade2->civismo2); ?></td>
                        <td class="tg-6hwt"><?= $grade2->nos_amarras2 ?> <?php $nos_amarras = intval($grade2->nos_amarras2); ?></td>
                        <td class="tg-6hwt"><?= $grade2->xadrez2 ?> <?php $xadrez = intval($grade2->xadrez2); ?></td>
                        <td class="tg-6hwt"><?= $grade2->sobrevivencia2 ?> <?php $sobrevivencia = intval($grade2->sobrevivencia2); ?></td>
                        <td class="tg-6hwt"><?= $grade2->orientacao2 ?> <?php $orientacao = intval($grade2->orientacao2); ?></td>
                        <td class="tg-6hwt"> <?php $media_pratica4 = ($civismo + $nos_amarras + $xadrez + $sobrevivencia + $orientacao) / 5;
                                                echo $media_pratica4; ?></td>
                    </tr>

                </tbody>
        </div>
        </table>

    <?php endif; ?>

    <?php

    $media_geral =  ((($media_subjetiva1 + $media_subjetiva2) * 2) + ($media_pratica1 + $media_pratica2 + $media_pratica3 + $media_pratica4) * 2) / 6;

    $media_final = number_format($media_geral, 1);


    if ($media_final >= 6) {

        $sentenca = "<span  class='text-success' style='font-weight:bold'> APROVADO ! </span> ";
    } else {
        $sentenca = "<span  class='text-danger' style='font-weight:bold'> EM PROCESSO ... </span> ";
    }
    ?>

    <hr>


    <div class="row">
        <div class="col-sm-6">
            <span>
                <h4 class="text-center" style='font-weight:bold'>Média Geral: <?php echo $media_final; ?></h4>
            </span>
        </div>
        <div class="col-sm-6">
            <span>
                <h4 class="text-center" style='font-weight:bold'>Resultado Final: <?php echo $sentenca; ?></h4>
            </span>
        </div>
    </div>

    <hr>

    <div class="row text-center">
        <a href='javascript:history.go(-1)' class="btn btn-danger btn-sm">Voltar</a>
    </div>

    <script type="text/javascript" src="js/custom.js"></script>
    </div>
    </body>
    <!--Rodapé da Pagina-->
    <div id="footer" padding="20">
        <hr>
        <div id="" class="text-center">
            <address id="Administração-CAP-copyright">
                <address id="version">
                    <p> Powered by <a href="http://casadeadoracaoprofetica.com.br" title="Sistema de gerenciamento Administrativo"> CAP &reg; - </a> Ministério de Tecnologia CAP
                        2022
                    <address id="webmaster-contact-information"> Contato dos <a href="mailto:fabricio.4135@gmail.com.br" title="Entre em contato com o webmaster via e-mail."> Desenvolvedores </a> para sugestões
                    </address>
                    </p></a>
        </div>
    </div>

</html>